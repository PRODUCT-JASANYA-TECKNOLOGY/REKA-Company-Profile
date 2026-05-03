<?php

namespace App\Providers;

use App\Support\Frontend\Blog\BlogArticleRepository;
use Illuminate\Support\ServiceProvider;
use JasanyaTech\SEO\Facades\SEO;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        SEO::sitemap()->register('blog', function (): array {
            $articles = app(BlogArticleRepository::class)
                ->all();

            $pages = [
                [
                    'url' => route('blog.index'),
                    'changefreq' => 'weekly',
                    'priority' => 0.8,
                ],
            ];

            foreach ($articles as $article) {
                $pages[] = [
                    'url' => route('blog.show', $article['slug']),
                    'lastmod' => $article['updated_at'] ?? $article['published_at'],
                    'changefreq' => 'monthly',
                    'priority' => 0.7,
                ];
            }

            return $pages;
        });
    }
}
