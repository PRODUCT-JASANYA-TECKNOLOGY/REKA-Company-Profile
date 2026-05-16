<?php

namespace App\Models;

use App\Traits\AuditedBySoftDelete;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Penawaran extends Model
{
    use HasFactory, SoftDeletes, AuditedBySoftDelete;

    protected $table = 'penawaran';

    protected $guarded = [];

    protected static function booted(): void
    {
        static::saving(function (Penawaran $penawaran): void {
            if (blank($penawaran->nomor_penawaran) || static::nomorPenawaranExists($penawaran->nomor_penawaran, $penawaran->getKey())) {
                $penawaran->nomor_penawaran = static::generateNomorPenawaran();
            }

            $items = static::normalizeItems($penawaran->items ?? []);
            $subtotal = static::calculateSubtotal($items);
            $taxRate = $penawaran->is_ppn ? static::resolveTaxRate() : 0.0;
            $ppn = round($subtotal * ($taxRate / 100), 2);

            $penawaran->items = $items;
            $penawaran->subtotal = $subtotal;
            $penawaran->ppn = $ppn;
            $penawaran->total_tagihan = round($subtotal + $ppn, 2);
        });
    }

    protected function casts(): array
    {
        return [
            'tanggal_pembuatan' => 'date',
            'tanggal_jatuh_tempo' => 'date',
            'items' => 'array',
            'is_ppn' => 'boolean',
            'subtotal' => 'decimal:2',
            'ppn' => 'decimal:2',
            'total_tagihan' => 'decimal:2',
        ];
    }

    public function klient(): BelongsTo
    {
        return $this->belongsTo(Klient::class, 'klient_id');
    }

    public function bankAccount(): BelongsTo
    {
        return $this->belongsTo(BankAccount::class, 'bank_account_id');
    }

    public function scopeWithPdfRelations(Builder $query): Builder
    {
        return $query->with(['klient.category', 'bankAccount']);
    }

    public static function generateNomorPenawaran(?Carbon $date = null): string
    {
        $date ??= now();
        $prefix = 'PEN-'.$date->format('Ymd');

        $latestNumber = static::query()
            ->where('nomor_penawaran', 'like', $prefix.'-%')
            ->latest('id')
            ->value('nomor_penawaran');

        $sequence = 1;

        if (filled($latestNumber)) {
            $lastSegment = (int) str($latestNumber)->afterLast('-')->toString();
            $sequence = $lastSegment + 1;
        }

        return sprintf('%s-%04d', $prefix, $sequence);
    }

    public function getNormalizedItemsAttribute(): array
    {
        return static::normalizeItems($this->items ?? []);
    }

    private static function normalizeItems(array $items): array
    {
        return collect($items)
            ->map(function (mixed $item): array {
                $title = trim((string) data_get($item, 'title'));
                $subItems = collect(data_get($item, 'sub_items', []))
                    ->map(function (mixed $subItem): array {
                        $quantity = max(0, (float) data_get($subItem, 'jumlah', 0));
                        $unitPrice = round((float) data_get($subItem, 'harga_satuan', 0), 2);
                        $total = round($quantity * $unitPrice, 2);

                        return [
                            'deskripsi' => trim((string) data_get($subItem, 'deskripsi')),
                            'jumlah' => $quantity,
                            'jumlah_label' => trim((string) data_get($subItem, 'jumlah_label')),
                            'harga_satuan' => $unitPrice,
                            'total' => $total,
                        ];
                    })
                    ->filter(fn (array $subItem): bool => filled($subItem['deskripsi']))
                    ->values()
                    ->all();

                return [
                    'title' => $title,
                    'sub_items' => $subItems,
                ];
            })
            ->filter(fn (array $item): bool => filled($item['title']) || filled($item['sub_items']))
            ->values()
            ->all();
    }

    private static function calculateSubtotal(array $items): float
    {
        return round(
            collect($items)
                ->flatMap(fn (array $item): array => $item['sub_items'])
                ->sum(fn (array $subItem): float => (float) $subItem['total']),
            2,
        );
    }

    private static function resolveTaxRate(): float
    {
        return (float) (Company::query()->value('tax_rate') ?? 0);
    }

    private static function nomorPenawaranExists(string $nomorPenawaran, mixed $ignoreId = null): bool
    {
        return static::query()
            ->when($ignoreId !== null, fn (Builder $query): Builder => $query->whereKeyNot($ignoreId))
            ->where('nomor_penawaran', $nomorPenawaran)
            ->exists();
    }
}
