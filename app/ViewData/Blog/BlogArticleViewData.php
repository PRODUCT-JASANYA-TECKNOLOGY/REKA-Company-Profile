<?php

namespace App\ViewData\Blog;

use Carbon\CarbonImmutable;

class BlogArticleViewData
{
    /**
     * @param  array<string, mixed>  $article
     */
    public function __construct(
        private readonly array $article,
    ) {}

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $createdAt = CarbonImmutable::parse((string) ($this->article['created_at'] ?? now()->toDateString()));
        $updatedAt = CarbonImmutable::parse((string) ($this->article['updated_at'] ?? $this->article['created_at'] ?? now()->toDateString()));

        return [
            'slug' => $this->article['slug'],
            'title' => $this->article['title'],
            'category_name' => $this->article['category_name'],
            'created_at_human' => $createdAt->locale('id')->translatedFormat('j F Y'),
            'created_at_iso' => $createdAt->toDateString(),
            'updated_at_iso' => $updatedAt->toDateString(),
            'image_url' => $this->article['image_url'],
            'hero_image_url' => $this->article['image_url'],
            'images' => $this->article['images'] ?? [],
            'excerpt' => $this->article['excerpt'],
            'content_html' => $this->article['content_html'],
            'url' => route('blog.show', $this->article['slug']),
        ];
    }
}
