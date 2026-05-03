<?php

namespace App\ViewData\Blog;

class BlogDetailViewData
{
    /**
     * @param  array<string, mixed>  $article
     * @param  array<int, array<string, mixed>>  $related
     */
    public function __construct(
        private readonly array $article,
        private readonly array $related,
    ) {}

    /**
     * @return array{article: array<string, mixed>, related: array<int, array<string, mixed>>}
     */
    public function toArray(): array
    {
        return [
            'article' => (new BlogArticleViewData($this->article))->toArray(),
            'related' => array_map(
                fn (array $article): array => (new BlogArticleViewData($article))->toArray(),
                $this->related,
            ),
        ];
    }
}
