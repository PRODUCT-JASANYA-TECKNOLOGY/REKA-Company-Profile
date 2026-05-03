<?php

namespace App\Models;

use App\Traits\AuditedBySoftDelete;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes, AuditedBySoftDelete;

    protected $table = 'category';

    protected $guarded = [];

    public function klients(): HasMany
    {
        return $this->hasMany(Klient::class, 'category_id');
    }

    public function layanans(): HasMany
    {
        return $this->hasMany(Layanan::class, 'category_id');
    }

    public function portofolios(): HasMany
    {
        return $this->hasMany(Portofolio::class, 'category_id');
    }

    public function blogs(): HasMany
    {
        return $this->hasMany(Blog::class, 'category_id');
    }
}
