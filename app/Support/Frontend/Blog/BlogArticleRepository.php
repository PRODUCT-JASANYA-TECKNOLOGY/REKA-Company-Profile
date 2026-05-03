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
            ->with('category')
            ->orderByDesc('updated_at')
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
            ->with('category')
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
            'title' => $blog->title,
            'category_name' => $blog->category?->nama,
            'created_at' => $blog->created_at?->toDateString(),
            'updated_at' => $blog->updated_at?->toDateString() ?? $blog->created_at?->toDateString(),
            'image_url' => is_array($blog->image) && $blog->image !== [] ? $blog->image[0] : null,
            'images' => $blog->image ?? [],
            'excerpt' => $blog->excerpt,
            'content_html' => $blog->content,
        ];
    }
}
