<?php

namespace App\ViewData\Blog;

class BlogIndexViewData
{
    /**
     * @param  array<int, array<string, mixed>>  $articles
     */
    public function __construct(
        private readonly array $articles,
    ) {}

    /**
     * @return array{featured: array<string, mixed>, articles: array<int, array<string, mixed>>}
     */
    public function toArray(): array
    {
        $articles = array_map(
            fn (array $article): array => (new BlogArticleViewData($article))->toArray(),
            $this->articles,
        );

        return [
            'featured' => $articles[0],
            'articles' => $articles,
        ];
    }
}
