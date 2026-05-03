<?php

namespace App\Models;

use App\Traits\AuditedBySoftDelete;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory, SoftDeletes, AuditedBySoftDelete;

    protected $table = 'blog';

    protected $guarded = [];

    protected static function booted(): void
    {
        static::saving(function (Blog $blog): void {
            if ($blog->title === null || $blog->title === '') {
                return;
            }

            if ($blog->isDirty('title') || blank($blog->slug)) {
                $blog->slug = static::generateUniqueSlug($blog->title, $blog->getKey());
            }
        });
    }

    protected function casts(): array
    {
        return [
            'image' => 'array',
        ];
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('active', true);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    private static function generateUniqueSlug(string $title, mixed $ignoreId = null): string
    {
        $baseSlug = Str::slug($title);
        $slug = $baseSlug;
        $counter = 2;

        while (static::query()
            ->when($ignoreId !== null, fn (Builder $query): Builder => $query->whereKeyNot($ignoreId))
            ->where('slug', $slug)
            ->exists()) {
            $slug = $baseSlug.'-'.$counter;
            $counter++;
        }

        return $slug;
    }
}
