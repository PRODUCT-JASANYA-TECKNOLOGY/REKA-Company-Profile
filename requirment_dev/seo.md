# Standar Integrasi SEO Frontend

Dokumen ini menjadi acuan integrasi SEO frontend Laravel menggunakan package:

```json
"jasanya/seo-library-laravel": "^1.0"
```

Dokumen ini mengikuti pola arsitektur project di `requirment_dev`, yaitu:

- Blade hanya untuk render
- Controller tetap tipis
- data halaman disiapkan di layer PHP
- SEO disusun dari controller/service, bukan dari view

Contoh implementasi yang dipakai di dokumen ini adalah halaman **Blog**.

---

## 1. Tujuan

Integrasi SEO di project ini harus menghasilkan:

- `<title>` dan meta description yang konsisten
- canonical URL per halaman
- Open Graph dan Twitter Card
- schema JSON-LD sesuai tipe halaman
- `sitemap.xml` dan sitemap source
- `robots.txt`

Sekaligus tetap menjaga arsitektur project tetap rapi dan mudah dipindahkan dari mock data ke database/admin panel.

---

## 2. Prinsip Integrasi

### A. SEO tidak ditulis manual di Blade page

Jangan pakai pola ini di halaman:

```blade
@section('title', 'Blog')
@section('description', 'Deskripsi halaman')
```

Untuk project ini, meta SEO dirender dari package melalui:

```blade
<x-seo::meta />
```

yang dipasang di layout utama.

### B. SEO disusun di layer PHP

SEO harus di-set dari:

- controller frontend
- action/service frontend
- data hasil query yang sudah siap render

Bukan dari:

- Blade
- Filament Resource
- query langsung di template

### C. Sitemap memakai source data yang sama dengan frontend

Data untuk:

- halaman blog
- detail blog
- SEO blog
- sitemap blog

harus berasal dari sumber data yang sama agar tidak terjadi perbedaan isi.

---

## 3. Arsitektur yang Dipakai

Gunakan alur berikut:

```text
Database / Seeder / Model
   -> Repository / Query Source
   -> Action Frontend
   -> ViewData
   -> Controller
   -> Blade
   -> SEO Package Render
```

Untuk halaman yang perlu sitemap:

```text
Database / Seeder / Model
   -> Repository / Query Source
   -> AppServiceProvider register sitemap source
   -> sitemap.xml / sitemaps/*.xml
```

---

## 4. Struktur Folder

Struktur minimal yang dipakai untuk SEO + frontend data:

```text
app/
├── Actions/
│   └── Frontend/
│       ├── GetBlogIndexData.php
│       └── GetBlogDetailData.php
│
├── Http/
│   └── Controllers/
│       ├── BlogController.php
│       └── SeoSitemapController.php
│
├── Models/
│   └── Blog.php
│
├── Providers/
│   └── AppServiceProvider.php
│
├── Support/
│   └── Frontend/
│       └── Blog/
│           └── BlogArticleRepository.php
│
└── ViewData/
    └── Blog/
        ├── BlogArticleViewData.php
        ├── BlogIndexViewData.php
        └── BlogDetailViewData.php

config/
└── seo.php

resources/
└── views/
    ├── layouts/
    │   └── app.blade.php
    └── vendor/
        └── seo/
            └── sitemap/
                ├── index.blade.php
                └── urlset.blade.php

database/
├── migrations/
│   └── create_blog_table.php
└── seeders/
    └── BlogSeeder.php

tests/
└── Feature/
    └── BlogSeoTest.php
```

---

## 5. Integrasi di Layout

Di layout utama:

**`resources/views/layouts/app.blade.php`**

```blade
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <x-seo::meta />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
```

Artinya:

- title dirender oleh package
- meta description dirender oleh package
- canonical, OG, Twitter, schema juga dirender oleh package

---

## 6. Konfigurasi SEO

Konfigurasi aplikasi disimpan di:

**`config/seo.php`**

Minimal field yang wajib disetel:

- `site.name`
- `site.url`
- `site.default_title`
- `site.default_description`
- `site.default_locale`
- `defaults.image`
- `organization.*`

Contoh:

```php
'site' => [
    'name' => env('SEO_SITE_NAME', 'REKA'),
    'url' => env('SEO_SITE_URL', env('APP_URL')),
    'title_separator' => '|',
    'default_title' => 'REKA',
    'default_description' => 'REKA membantu bisnis tumbuh dengan solusi digital yang scalable dan terpercaya.',
    'default_locale' => 'id_ID',
],
```

---

## 7. Contoh Implementasi Blog

### A. Model

Blog disimpan di tabel `blog` melalui model:

**`app/Models/Blog.php`**

Tanggung jawab model:

- nama tabel
- casts
- scope reusable

Contoh scope:

```php
public function scopeActive(Builder $query): Builder
{
    return $query->where('active', true);
}

public function scopePublished(Builder $query): Builder
{
    return $query->whereDate('published_at', '<=', now()->toDateString());
}
```

### B. Repository / Query Source

Query data blog diletakkan di:

**`app/Support/Frontend/Blog/BlogArticleRepository.php`**

Tanggung jawab repository:

- ambil data blog dari database
- filter hanya data yang aktif dan publish
- urutkan data
- kembalikan payload awal yang konsisten

Contoh:

```php
return Blog::query()
    ->active()
    ->published()
    ->orderByDesc('published_at')
    ->orderByDesc('id')
    ->get()
    ->map(fn (Blog $blog): array => $this->map($blog))
    ->all();
```

### C. Action Frontend

Action dipakai agar controller tetap tipis:

- `GetBlogIndexData`
- `GetBlogDetailData`

Tanggung jawab:

- panggil repository
- pilih featured article
- pilih related article
- kirim ke view-data

### D. ViewData

ViewData dipakai untuk menyiapkan field final yang siap render di Blade.

Contoh field final:

- `title`
- `category_name`
- `reading_time_label`
- `published_at_human`
- `published_at_iso`
- `updated_at_iso`
- `image_url`
- `hero_image_url`
- `excerpt`
- `content_html`
- `url`

Dengan pola ini Blade tidak perlu melakukan:

- formatting tanggal
- membangun URL
- fallback field
- transform nama kolom database

### E. Controller

Controller blog:

**`app/Http/Controllers/BlogController.php`**

Contoh blog index:

```php
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
```

Contoh blog detail:

```php
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
```

---

## 8. Sitemap

Source sitemap didaftarkan di:

**`app/Providers/AppServiceProvider.php`**

Contoh:

```php
SEO::sitemap()->register('blog', function (): array {
    $articles = app(BlogArticleRepository::class)->all();

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
```

Untuk project ini, route sitemap diambil alih oleh aplikasi sendiri melalui:

- `SeoSitemapController`
- `routes/web.php`

Alasannya:

- route sitemap bawaan package mengalami bug pada endpoint source sitemap
- builder package tetap dipakai
- output XML tetap mengikuti view `seo::sitemap.*`

---

## 9. Seeder Blog

Karena data blog di project ini masih awal, data bisa dikelola dari:

- migration `blog`
- seeder `BlogSeeder`

Seeder dipakai untuk:

- menyiapkan konten awal
- memastikan frontend blog langsung punya data
- memastikan test SEO dan sitemap bisa jalan

Seeder blog didaftarkan di:

**`database/seeders/DatabaseSeeder.php`**

---

## 10. Aturan Blade

Blade blog boleh:

```blade
{{ $article['title'] }}
{{ $article['excerpt'] }}
{!! $article['content_html'] !!}
```

Blade blog tidak boleh:

```blade
@section('title', '...')
@section('description', '...')
@php ... @endphp
request()->fullUrl()
route(...) untuk membangun payload data
\Carbon\Carbon::parse(...)
```

Semua kebutuhan SEO dan formatting harus sudah disiapkan sebelum masuk view.

---

## 11. Checklist Implementasi SEO Halaman Baru

Jika nanti menambah SEO untuk halaman lain seperti layanan, produk, atau portofolio, pakai checklist ini:

1. Pastikan data halaman punya source yang jelas dari model/repository
2. Siapkan action frontend untuk halaman tersebut
3. Siapkan view-data agar Blade hanya render
4. Pasang `SEO::...` di controller
5. Tambahkan breadcrumb dan canonical
6. Tambahkan schema yang sesuai:
   - `forBlogPost()` untuk artikel
   - `forProduct()` untuk produk
   - `forService()` untuk layanan
7. Daftarkan source sitemap bila halaman perlu masuk sitemap
8. Tambahkan feature test untuk meta dan sitemap

---

## 12. File yang Menjadi Referensi

- [config/seo.php](/Users/wahyudwiutomo/KERJAAN/Jasanya/Project/Jasanya%20IT/config/seo.php:1)
- [app/Http/Controllers/BlogController.php](/Users/wahyudwiutomo/KERJAAN/Jasanya/Project/Jasanya%20IT/app/Http/Controllers/BlogController.php:1)
- [app/Support/Frontend/Blog/BlogArticleRepository.php](/Users/wahyudwiutomo/KERJAAN/Jasanya/Project/Jasanya%20IT/app/Support/Frontend/Blog/BlogArticleRepository.php:1)
- [app/ViewData/Blog/BlogArticleViewData.php](/Users/wahyudwiutomo/KERJAAN/Jasanya/Project/Jasanya%20IT/app/ViewData/Blog/BlogArticleViewData.php:1)
- [app/Providers/AppServiceProvider.php](/Users/wahyudwiutomo/KERJAAN/Jasanya/Project/Jasanya%20IT/app/Providers/AppServiceProvider.php:1)
- [app/Http/Controllers/SeoSitemapController.php](/Users/wahyudwiutomo/KERJAAN/Jasanya/Project/Jasanya%20IT/app/Http/Controllers/SeoSitemapController.php:1)
- [database/seeders/BlogSeeder.php](/Users/wahyudwiutomo/KERJAAN/Jasanya/Project/Jasanya%20IT/database/seeders/BlogSeeder.php:1)
- [tests/Feature/BlogSeoTest.php](/Users/wahyudwiutomo/KERJAAN/Jasanya/Project/Jasanya%20IT/tests/Feature/BlogSeoTest.php:1)
