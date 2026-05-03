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
        $publishedAt = CarbonImmutable::parse((string) $this->article['published_at']);
        $updatedAt = CarbonImmutable::parse((string) ($this->article['updated_at'] ?? $this->article['published_at']));

        return [
            'slug' => $this->article['slug'],
            'title' => $this->article['title'],
            'category_name' => $this->article['category_name'],
            'reading_time_label' => $this->article['reading_time_label'],
            'published_at_human' => $publishedAt->locale('id')->translatedFormat('j F Y'),
            'published_at_iso' => $publishedAt->toDateString(),
            'updated_at_iso' => $updatedAt->toDateString(),
            'image_url' => $this->article['image_url'],
            'hero_image_url' => $this->article['image_url'],
            'excerpt' => $this->article['excerpt'],
            'content_html' => $this->article['content_html'],
            'url' => route('blog.show', $this->article['slug']),
        ];
    }
}
