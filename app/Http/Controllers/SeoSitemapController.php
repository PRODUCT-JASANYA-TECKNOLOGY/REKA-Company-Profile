<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use JasanyaTech\SEO\Sitemap\SitemapBuilder;

class SeoSitemapController extends Controller
{
    public function index(SitemapBuilder $builder): Response
    {
        $payload = $builder->buildIndex();

        if ($payload['type'] === 'index') {
            return response()
                ->view('seo::sitemap.index', ['sitemaps' => $payload['sitemaps']], 200, [
                    'Content-Type' => 'application/xml; charset=UTF-8',
                ]);
        }

        return response()
            ->view('seo::sitemap.urlset', ['urls' => $payload['urls']], 200, [
                'Content-Type' => 'application/xml; charset=UTF-8',
            ]);
    }

    public function show(string $source, SitemapBuilder $builder): Response
    {
        $payload = $builder->buildSource($source, 1);

        abort_if($payload === null, 404);

        return response()
            ->view('seo::sitemap.urlset', ['urls' => $payload], 200, [
                'Content-Type' => 'application/xml; charset=UTF-8',
            ]);
    }

    public function showChunk(string $source, int $page, SitemapBuilder $builder): Response
    {
        $payload = $builder->buildSource($source, $page);

        abort_if($payload === null, 404);

        return response()
            ->view('seo::sitemap.urlset', ['urls' => $payload], 200, [
                'Content-Type' => 'application/xml; charset=UTF-8',
            ]);
    }
}
