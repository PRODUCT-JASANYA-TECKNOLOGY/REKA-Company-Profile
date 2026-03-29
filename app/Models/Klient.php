<?php

namespace App\Models;

use App\Traits\AuditedBySoftDelete;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Klient extends Model
{
    use HasFactory, SoftDeletes, AuditedBySoftDelete;

    protected $table = 'klient';

    protected $guarded = [];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function portofolios(): HasMany
    {
        return $this->hasMany(Portofolio::class, 'klient_id');
    }

    public function testimonis(): HasMany
    {
        return $this->hasMany(Testimoni::class, 'klient_id');
    }
}
