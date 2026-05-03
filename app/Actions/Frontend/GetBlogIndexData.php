<?php

namespace App\Actions\Frontend;

use App\Support\Frontend\Blog\BlogArticleRepository;
use App\ViewData\Blog\BlogIndexViewData;

class GetBlogIndexData
{
    public function __construct(
        private readonly BlogArticleRepository $articles,
    ) {}

    /**
     * @return array{featured: array<string, mixed>, articles: array<int, array<string, mixed>>}
     */
    public function handle(): array
    {
        return (new BlogIndexViewData($this->articles->all()))->toArray();
    }
}
