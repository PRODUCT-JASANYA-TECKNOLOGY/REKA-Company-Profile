# Frontend Development Guide — REKA Company Profile

Dokumen ini menjelaskan standar konversi template HTML dari `contoh_tamplate/` menjadi blade Laravel, termasuk setup Tailwind CSS, struktur layout, dan komponen frontend.

---

## 1. Setup Tailwind CSS (Vite)

Template saat ini menggunakan Tailwind via CDN:
```html
<script src="https://cdn.tailwindcss.com"></script>
```

Untuk production, Tailwind harus diinstall via NPM dan dikompilasi dengan Vite (sudah tersedia di Laravel 13).

```bash
npm install -D tailwindcss @tailwindcss/vite
```

Tambahkan plugin ke `vite.config.js`:
```js
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({ input: ['resources/css/app.css', 'resources/js/app.js'], refresh: true }),
        tailwindcss(),
    ],
});
```

Di `resources/css/app.css`:
```css
@import "tailwindcss";
```

Pindahkan konfigurasi Tailwind custom dari `assets/tw-config.js` ke `resources/css/app.css` sebagai custom theme.

---

## 2. Struktur Direktori Views

```
resources/views/
│
├── layouts/
│   └── app.blade.php            # Layout utama (navbar + footer + slot)
│
├── components/
│   ├── navbar.blade.php         # Komponen navbar (shared semua halaman)
│   ├── footer.blade.php         # Komponen footer (shared semua halaman)
│   └── hero-header.blade.php    # Komponen hero header untuk inner pages
│
├── sections/                    # Komponen section per-halaman
│   ├── home/
│   │   ├── hero.blade.php
│   │   ├── trust-bar.blade.php
│   │   ├── layanan-preview.blade.php
│   │   ├── kenapa-reka.blade.php
│   │   ├── proses-preview.blade.php
│   │   ├── testimoni.blade.php
│   │   ├── faq.blade.php
│   │   └── cta.blade.php
│   ├── blog/
│   │   ├── featured.blade.php
│   │   └── grid.blade.php
│   ├── layanan/
│   │   ├── hero.blade.php
│   │   └── cards.blade.php
│   ├── portofolio/
│   │   └── grid.blade.php
│   ├── produk/
│   │   └── grid.blade.php
│   └── kontak/
│       └── form.blade.php
│
└── pages/                       # View halaman utama
    ├── home.blade.php
    ├── blog/
    │   ├── index.blade.php
    │   └── show.blade.php
    ├── layanan.blade.php
    ├── portofolio.blade.php
    ├── produk/
    │   ├── index.blade.php
    │   └── show.blade.php
    ├── proses.blade.php
    └── kontak.blade.php
```

---

## 3. Pemetaan HTML → Blade

| File HTML                  | Blade View                          | Keterangan                        |
|----------------------------|-------------------------------------|-----------------------------------|
| `index.html`               | `pages/home.blade.php`              | Beranda                           |
| `blog.html`                | `pages/blog/index.blade.php`        | Daftar artikel                    |
| `blog-detail.html`         | `pages/blog/show.blade.php`         | Detail artikel                    |
| `layanan.html`             | `pages/layanan.blade.php`           | Halaman layanan                   |
| `proses.html`              | `pages/proses.blade.php`            | Halaman proses kerja              |
| `portofolio.html`          | `pages/portofolio.blade.php`        | Halaman portfolio                 |
| `produk.html`              | `pages/produk/index.blade.php`      | Daftar produk                     |
| `produk-detail.html`       | `pages/produk/show.blade.php`       | Detail produk                     |
| `kontak.html`              | `pages/kontak.blade.php`            | Halaman kontak/form               |

---

## 4. Layout Utama

**`resources/views/layouts/app.blade.php`**

```blade
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'REKA — Solusi Digital Jasanya.id')</title>
    <meta name="description" content="@yield('description', 'REKA membantu bisnis Anda tumbuh dengan solusi digital scalable dan terpercaya.')">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- Lucide Icons --}}
    <script src="https://unpkg.com/lucide@latest" defer></script>
    @stack('styles')
</head>
<body class="bg-white text-gray-950">

    @include('components.navbar')

    <main>
        @yield('content')
    </main>

    @include('components.footer')

    <script>lucide.createIcons();</script>
    @stack('scripts')
</body>
</html>
```

---

## 5. Komponen Navbar

**`resources/views/components/navbar.blade.php`**

```blade
<nav id="navbar" class="fixed top-0 left-0 right-0 z-50 bg-white border-b border-transparent transition-[border-color,box-shadow] duration-300">
    <div class="max-w-7xl mx-auto px-5 lg:px-8 h-16 flex items-center justify-between">
        <a href="{{ route('home') }}">
            <img src="{{ asset('images/logo-reka.png') }}" alt="REKA" class="h-12 w-auto object-contain block" />
        </a>
        <ul class="hidden lg:flex items-center gap-6 list-none">
            <li><a href="{{ route('home') }}"      class="nav-link-item text-sm font-medium text-gray-500 hover:text-gray-950 transition-colors {{ request()->routeIs('home') ? 'text-gray-950' : '' }}">Beranda</a></li>
            <li><a href="{{ route('layanan') }}"   class="nav-link-item text-sm font-medium text-gray-500 hover:text-gray-950 transition-colors {{ request()->routeIs('layanan') ? 'text-gray-950' : '' }}">Layanan</a></li>
            <li><a href="{{ route('proses') }}"    class="nav-link-item text-sm font-medium text-gray-500 hover:text-gray-950 transition-colors {{ request()->routeIs('proses') ? 'text-gray-950' : '' }}">Proses</a></li>
            <li><a href="{{ route('portofolio') }}" class="nav-link-item text-sm font-medium text-gray-500 hover:text-gray-950 transition-colors {{ request()->routeIs('portofolio') ? 'text-gray-950' : '' }}">Portofolio</a></li>
            <li><a href="{{ route('produk.index') }}" class="nav-link-item text-sm font-medium text-gray-500 hover:text-gray-950 transition-colors {{ request()->routeIs('produk.*') ? 'text-gray-950' : '' }}">Produk</a></li>
            <li><a href="{{ route('blog.index') }}" class="nav-link-item text-sm font-medium text-gray-500 hover:text-gray-950 transition-colors {{ request()->routeIs('blog.*') ? 'text-gray-950' : '' }}">Blog</a></li>
            <li><a href="{{ route('kontak') }}"    class="nav-link-item text-sm font-medium text-gray-500 hover:text-gray-950 transition-colors {{ request()->routeIs('kontak') ? 'text-gray-950' : '' }}">Kontak</a></li>
        </ul>
        <a href="{{ route('kontak') }}" class="hidden lg:inline-flex items-center gap-2 px-6 py-2.5 rounded-full bg-gray-950 text-white text-sm font-medium hover:bg-gray-800 transition-colors">Mulai Proyek</a>
        <button id="hamburger" class="lg:hidden p-2 rounded-lg" aria-label="Menu">
            <i data-lucide="menu" class="w-5 h-5"></i>
        </button>
    </div>
    {{-- Mobile Menu --}}
    <div id="mobile-menu" class="hidden lg:hidden border-t border-gray-200 bg-white">
        <ul class="px-5 py-4 flex flex-col gap-3 list-none">
            <li><a href="{{ route('home') }}"          class="nav-link-item text-base font-medium text-gray-600 hover:text-gray-950 block py-1">Beranda</a></li>
            <li><a href="{{ route('layanan') }}"       class="nav-link-item text-base font-medium text-gray-600 hover:text-gray-950 block py-1">Layanan</a></li>
            <li><a href="{{ route('proses') }}"        class="nav-link-item text-base font-medium text-gray-600 hover:text-gray-950 block py-1">Proses</a></li>
            <li><a href="{{ route('portofolio') }}"    class="nav-link-item text-base font-medium text-gray-600 hover:text-gray-950 block py-1">Portofolio</a></li>
            <li><a href="{{ route('produk.index') }}"  class="nav-link-item text-base font-medium text-gray-600 hover:text-gray-950 block py-1">Produk</a></li>
            <li><a href="{{ route('blog.index') }}"    class="nav-link-item text-base font-medium text-gray-600 hover:text-gray-950 block py-1">Blog</a></li>
            <li><a href="{{ route('kontak') }}"        class="nav-link-item text-base font-medium text-gray-600 hover:text-gray-950 block py-1">Kontak</a></li>
        </ul>
        <div class="px-5 pb-5">
            <a href="{{ route('kontak') }}" class="flex items-center justify-center gap-2 px-6 py-3 rounded-full bg-gray-950 text-white text-sm font-medium">Mulai Proyek</a>
        </div>
    </div>
</nav>
```

> **Catatan**: Gunakan `request()->routeIs('...')` untuk menandai link aktif secara dinamis.

---

## 6. Komponen Footer

**`resources/views/components/footer.blade.php`**

```blade
<footer class="border-t border-gray-200 bg-white">
    <div class="max-w-7xl mx-auto px-5 lg:px-8 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-10">
            {{-- Brand --}}
            <div class="lg:col-span-2">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/logo-reka.png') }}" alt="REKA" class="h-10 mb-4" />
                </a>
                <p class="text-sm leading-relaxed text-gray-500 max-w-xs mb-5">REKA adalah unit solusi digital dari Jasanya.id yang berfokus pada pengembangan software dan sistem bisnis yang scalable & reliable.</p>
                {{-- Social icons --}}
                <div class="flex gap-2">
                    <a href="#" class="w-8 h-8 rounded-lg flex items-center justify-center bg-gray-100 text-gray-500 border border-gray-200 hover:bg-gray-950 hover:text-white transition-colors"><i data-lucide="github" class="w-3.5 h-3.5"></i></a>
                    <a href="#" class="w-8 h-8 rounded-lg flex items-center justify-center bg-gray-100 text-gray-500 border border-gray-200 hover:bg-gray-950 hover:text-white transition-colors"><i data-lucide="linkedin" class="w-3.5 h-3.5"></i></a>
                    <a href="#" class="w-8 h-8 rounded-lg flex items-center justify-center bg-gray-100 text-gray-500 border border-gray-200 hover:bg-gray-950 hover:text-white transition-colors"><i data-lucide="instagram" class="w-3.5 h-3.5"></i></a>
                </div>
            </div>
            {{-- Nav Links --}}
            <div>
                <h4 class="font-grotesk text-sm font-semibold mb-4">Layanan</h4>
                <ul class="flex flex-col gap-2.5 list-none">
                    <li><a href="{{ route('layanan') }}" class="text-sm text-gray-500 hover:text-gray-950 transition-colors">Custom Software</a></li>
                    <li><a href="{{ route('layanan') }}" class="text-sm text-gray-500 hover:text-gray-950 transition-colors">Web Development</a></li>
                    <li><a href="{{ route('layanan') }}" class="text-sm text-gray-500 hover:text-gray-950 transition-colors">Mobile App</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-grotesk text-sm font-semibold mb-4">Perusahaan</h4>
                <ul class="flex flex-col gap-2.5 list-none">
                    <li><a href="{{ route('home') }}"       class="text-sm text-gray-500 hover:text-gray-950 transition-colors">Beranda</a></li>
                    <li><a href="{{ route('proses') }}"     class="text-sm text-gray-500 hover:text-gray-950 transition-colors">Proses Kerja</a></li>
                    <li><a href="{{ route('portofolio') }}" class="text-sm text-gray-500 hover:text-gray-950 transition-colors">Portofolio</a></li>
                    <li><a href="{{ route('blog.index') }}" class="text-sm text-gray-500 hover:text-gray-950 transition-colors">Blog</a></li>
                    <li><a href="{{ route('kontak') }}"     class="text-sm text-gray-500 hover:text-gray-950 transition-colors">Kontak</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="border-t border-gray-200 px-5 lg:px-8 py-4">
        <div class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-2">
            <p class="text-xs text-gray-400">&copy; {{ date('Y') }} REKA &mdash; Bagian dari ekosistem Jasanya.id. Semua hak dilindungi.</p>
            <p class="text-xs text-gray-400">solusidigital.jasanya.id</p>
        </div>
    </div>
</footer>
```

---

## 7. Contoh Halaman

**`resources/views/pages/home.blade.php`**

```blade
@extends('layouts.app')

@section('title', 'REKA — Solusi Digital Jasanya.id')
@section('description', 'Mulai dari website, aplikasi, hingga sistem kompleks — REKA membantu bisnis Anda tumbuh dengan solusi digital yang scalable.')

@section('content')
    @include('sections.home.hero')
    @include('sections.home.trust-bar')
    @include('sections.home.layanan-preview')
    @include('sections.home.kenapa-reka')
    @include('sections.home.proses-preview')
    @include('sections.home.testimoni')
    @include('sections.home.faq')
    @include('sections.home.cta')
@endsection
```

**`resources/views/pages/blog/index.blade.php`**

```blade
@extends('layouts.app')

@section('title', 'Blog — REKA')

@section('content')
    @include('sections.blog.featured', ['article' => $featured])
    @include('sections.blog.grid', ['articles' => $articles])
@endsection
```

---

## 8. Rendering & Wiring Data (Controller)

> **Penting**: Setiap halaman *harus* memiliki Controller. Hal ini ditujukan agar proses *wiring data* (seperti mengambil data dari database, memformat data, dsb) terpisah dari Route dan View.

**`app/Http/Controllers/HomeController.php`**
```php
<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        // Proses wiring data di sini (jika ada)
        return view('pages.home');
    }
}
```

---

## 9. Routing (`routes/web.php`)

Gunakan pemanggilan class Controller di file *routing* alih-alih menggunakan *closure*.

```php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProdukController;

Route::get('/',           [HomeController::class, 'index'])->name('home');
Route::get('/layanan',    [HomeController::class, 'layanan'])->name('layanan');
Route::get('/proses',     [HomeController::class, 'proses'])->name('proses');
Route::get('/portofolio', [HomeController::class, 'portofolio'])->name('portofolio');
Route::get('/kontak',     [HomeController::class, 'kontak'])->name('kontak');

Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/',    [BlogController::class, 'index'])->name('index');
    Route::get('/{slug}', [BlogController::class, 'show'])->name('show');
});

Route::prefix('produk')->name('produk.')->group(function () {
    Route::get('/',    [ProdukController::class, 'index'])->name('index');
    Route::get('/{slug}', [ProdukController::class, 'show'])->name('show');
});
```

---

## 9. Assets

- **Logo**: Pindahkan ke `public/images/logo-reka.png`. Akses via `{{ asset('images/logo-reka.png') }}`.
- **CSS Custom** (`reka-min.css`): Import ke `resources/css/app.css` atau konversi ke Tailwind config.
- **JS Custom** (`reka.js`): Pindahkan ke `resources/js/reka.js` dan import di `resources/js/app.js`.
- **Lucide Icons**: Tetap gunakan CDN atau install via NPM: `npm install lucide`.

---

## 10. Checklist Konversi

```
[ ] Setup Tailwind CSS via Vite (ganti CDN)
[ ] Buat layouts/app.blade.php
[ ] Buat components/navbar.blade.php
[ ] Buat components/footer.blade.php
[ ] Konversi index.html → pages/home.blade.php + sections/home/
[ ] Konversi blog.html → pages/blog/index.blade.php + sections/blog/
[ ] Konversi blog-detail.html → pages/blog/show.blade.php
[ ] Konversi layanan.html → pages/layanan.blade.php + sections/layanan/
[ ] Konversi proses.html → pages/proses.blade.php
[ ] Konversi portofolio.html → pages/portofolio.blade.php
[ ] Konversi produk.html → pages/produk/index.blade.php
[ ] Konversi produk-detail.html → pages/produk/show.blade.php
[ ] Konversi kontak.html → pages/kontak.blade.php
[ ] Setup routes di web.php
[ ] Pindahkan assets (logo, css, js) ke public/
[ ] Jalankan npm run dev dan validasi tampilan
```
