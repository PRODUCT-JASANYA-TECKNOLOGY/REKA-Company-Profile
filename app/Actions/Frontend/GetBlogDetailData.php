<?php

namespace App\Actions\Frontend;

use App\Support\Frontend\Blog\BlogArticleRepository;
use App\ViewData\Blog\BlogDetailViewData;

class GetBlogDetailData
{
    public function __construct(
        private readonly BlogArticleRepository $articles,
    ) {}

    /**
     * @return array{article: array<string, mixed>, related: array<int, array<string, mixed>>}|null
     */
    public function handle(string $slug): ?array
    {
        $article = $this->articles->findBySlug($slug);

        if ($article === null) {
            return null;
        }

        $related = array_values(array_filter(
            $this->articles->all(),
            fn (array $candidate): bool => $candidate['slug'] !== $slug,
        ));

        return (new BlogDetailViewData($article, array_slice($related, 0, 3)))->toArray();
    }
}
