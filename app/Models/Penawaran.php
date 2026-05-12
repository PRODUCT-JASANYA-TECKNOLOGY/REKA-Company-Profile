<?php

namespace App\Models;

use App\Traits\AuditedBySoftDelete;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penawaran extends Model
{
    use HasFactory, SoftDeletes, AuditedBySoftDelete;

    protected $table = 'penawaran';

    protected $guarded = [];

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
}
