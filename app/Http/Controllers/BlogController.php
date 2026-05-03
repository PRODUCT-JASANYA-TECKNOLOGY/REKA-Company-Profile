<?php

namespace App\Http\Controllers;

use App\Actions\Frontend\GetBlogDetailData;
use App\Actions\Frontend\GetBlogIndexData;
use JasanyaTech\SEO\Facades\SEO;

class BlogController extends Controller
{
    public function index(GetBlogIndexData $getBlogIndexData)
    {
        $payload = $getBlogIndexData->handle();

        SEO::forBlogListing(
            title: 'Blog',
            description: 'Insights, panduan praktis, dan perspektif dari tim REKA tentang pengembangan software dan transformasi digital bisnis.',
            breadcrumbs: [
                ['name' => 'Home', 'url' => route('home')],
                ['name' => 'Blog', 'url' => route('blog.index')],
            ],
            canonical: route('blog.index'),
        )->website();

        return view('pages.blog', $payload);
    }

    public function show(string $slug, GetBlogDetailData $getBlogDetailData)
    {
        $payload = $getBlogDetailData->handle($slug);

        if ($payload === null) {
            abort(404);
        }

        SEO::forBlogPost($payload['article'], [
            'breadcrumbs' => [
                ['name' => 'Home', 'url' => route('home')],
                ['name' => 'Blog', 'url' => route('blog.index')],
                ['name' => $payload['article']['title'], 'url' => $payload['article']['url']],
            ],
            'canonical' => $payload['article']['url'],
            'image' => $payload['article']['image_url'],
            'schema_image' => $payload['article']['image_url'],
            'datePublished' => $payload['article']['published_at_iso'],
            'dateModified' => $payload['article']['updated_at_iso'],
            'mainEntityOfPage' => $payload['article']['url'],
        ]);

        return view('pages.blog-detail', $payload);
    }
}
