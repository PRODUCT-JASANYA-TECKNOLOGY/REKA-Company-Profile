<?php

namespace App\Models;

use App\Traits\AuditedBySoftDelete;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Layanan extends Model
{
    use HasFactory, SoftDeletes, AuditedBySoftDelete;

    protected $table = 'layanan';

    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'lingkup' => 'array',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function tools(): BelongsToMany
    {
        return $this->belongsToMany(Tools::class, 'layanan_tools', 'layanan_id', 'tools_id');
    }

    public function layananTools(): HasMany
    {
        return $this->hasMany(LayananTools::class, 'layanan_id');
    }
}
