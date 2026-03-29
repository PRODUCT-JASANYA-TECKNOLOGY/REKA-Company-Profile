<?php

namespace App\Models;

use App\Traits\AuditedBySoftDelete;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tools extends Model
{
    use HasFactory, SoftDeletes, AuditedBySoftDelete;

    protected $table = 'tools';

    protected $guarded = [];

    public function layanans(): BelongsToMany
    {
        return $this->belongsToMany(Layanan::class, 'layanan_tools', 'tools_id', 'layanan_id');
    }

    public function portofolios(): BelongsToMany
    {
        return $this->belongsToMany(Portofolio::class, 'portofolio_tools', 'tools_id', 'portofolio_id');
    }

    public function layananTools(): HasMany
    {
        return $this->hasMany(LayananTools::class, 'tools_id');
    }

    public function portofolioTools(): HasMany
    {
        return $this->hasMany(PortofolioTools::class, 'tools_id');
    }
}
