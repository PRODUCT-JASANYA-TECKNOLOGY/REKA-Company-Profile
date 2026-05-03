<?php

namespace App\Models;

use App\Traits\AuditedBySoftDelete;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory, SoftDeletes, AuditedBySoftDelete;

    protected $table = 'blog';

    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'published_at' => 'date',
        ];
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('active', true);
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->whereDate('published_at', '<=', now()->toDateString());
    }
}
