<?php

namespace App\Models;

use App\Traits\AuditedBySoftDelete;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Portofolio extends Model
{
    use HasFactory, SoftDeletes, AuditedBySoftDelete;

    protected $table = 'portofolio';

    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'tanggal_proyek' => 'date',
        ];
    }

    public function klient(): BelongsTo
    {
        return $this->belongsTo(Klient::class, 'klient_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function tools(): BelongsToMany
    {
        return $this->belongsToMany(Tools::class, 'portofolio_tools', 'portofolio_id', 'tools_id');
    }

    public function portofolioTools(): HasMany
    {
        return $this->hasMany(PortofolioTools::class, 'portofolio_id');
    }
}
