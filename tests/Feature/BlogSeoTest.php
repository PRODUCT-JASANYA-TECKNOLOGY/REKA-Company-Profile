<?php

namespace Tests\Feature;

use Database\Seeders\BlogSeeder;
use Database\Seeders\CategorySeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BlogSeoTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(CategorySeeder::class);
        $this->seed(BlogSeeder::class);
    }

    public function test_blog_index_renders_seo_meta(): void
    {
        $response = $this->get(route('blog.index'));

        $response->assertOk();
        $response->assertSee('<title>Blog | REKA</title>', false);
        $response->assertSee('rel="canonical"', false);
        $response->assertSee('href="'.route('blog.index').'"', false);
        $response->assertSee('property="og:title" content="Blog | REKA"', false);
        $response->assertSee('application/ld+json', false);
    }

    public function test_blog_detail_renders_article_seo_meta(): void
    {
        $response = $this->get(route('blog.show', 'memilih-tech-stack-2025'));

        $response->assertOk();
        $response->assertSee('<title>Cara Memilih Tech Stack yang Tepat untuk Proyek Digital Anda di 2025 | REKA</title>', false);
        $response->assertSee('property="og:type" content="article"', false);
        $response->assertSee('name="description" content="Memilih teknologi yang salah bisa membuang waktu dan uang. Pelajari framework pemilihan tech stack yang kami gunakan untuk klien enterprise."', false);
        $response->assertSee('https://schema.org', false);
    }

    public function test_blog_detail_returns_not_found_for_unknown_slug(): void
    {
        $this->get(route('blog.show', 'unknown-slug'))
            ->assertNotFound();
    }

    public function test_sitemap_contains_blog_urls(): void
    {
        $response = $this->get(route('seo.sitemap.index'));

        $response->assertOk();
        $response->assertSee(route('seo.sitemap.source', 'blog'), false);

        $blogSitemap = $this->get(route('seo.sitemap.source', 'blog'));

        $blogSitemap->assertOk();
        $blogSitemap->assertSee(route('blog.index'), false);
        $blogSitemap->assertSee(route('blog.show', 'memilih-tech-stack-2025'), false);
    }
}
