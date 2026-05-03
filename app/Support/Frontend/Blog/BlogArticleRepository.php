<?php

namespace App\Support\Frontend\Blog;

use App\Models\Blog;

class BlogArticleRepository
{
    /**
     * @return array<int, array<string, mixed>>
     */
    public function all(): array
    {
        return Blog::query()
            ->active()
            ->published()
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->get()
            ->map(fn (Blog $blog): array => $this->map($blog))
            ->all();
    }

    /**
     * @return array<string, mixed>|null
     */
    public function findBySlug(string $slug): ?array
    {
        $blog = Blog::query()
            ->active()
            ->published()
            ->where('slug', $slug)
            ->first();

        return $blog ? $this->map($blog) : null;
    }

    /**
     * @return array<string, mixed>
     */
    private function map(Blog $blog): array
    {
        return [
            'slug' => $blog->slug,
            'title' => $blog->judul,
            'category_name' => $blog->kategori,
            'reading_time_label' => $blog->waktu_baca,
            'published_at' => $blog->published_at?->toDateString(),
            'updated_at' => $blog->updated_at?->toDateString() ?? $blog->published_at?->toDateString(),
            'image_url' => $blog->thumbnail,
            'excerpt' => $blog->excerpt,
            'content_html' => $blog->isi,
        ];
    }
}
