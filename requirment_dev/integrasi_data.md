# Integrasi Data FAQ ke Halaman Home

Dokumen ini menjelaskan alur integrasi data FAQ dari database (`app/Models/Faq.php`) ke section:

- `resources/views/sections/home/faq.blade.php`

dengan ketentuan hanya menampilkan data `active = true`.

## 1) Controller

Update `HomeController@index`:

```php
use App\Models\Faq;

public function index()
{
    $faqs = Faq::query()
        ->where('active', true)
        ->orderBy('id')
        ->get();

    return view('pages.home', compact('faqs'));
}
```

## 2) View Section FAQ

Ubah section FAQ menjadi dinamis menggunakan loop:

```blade
@forelse ($faqs as $faq)
  <div class="faq-item border-b border-gray-200">
    <button class="faq-question ...">
      <span>{{ $faq->pertanyaan }}</span>
    </button>
    <div class="faq-answer">
      <p>{!! nl2br(e($faq->jawaban)) !!}</p>
    </div>
  </div>
@empty
  <div class="faq-item border-b border-gray-200">
    <div class="py-6">
      <p>FAQ belum tersedia.</p>
    </div>
  </div>
@endforelse
```

## 3) Seeder FAQ

Pastikan FAQ sudah di-seed:

```bash
docker compose exec app php artisan db:seed --class=FaqSeeder
```

Atau seed semua:

```bash
docker compose exec app php artisan db:seed
```

## 4) Checklist

- Data FAQ tersimpan di tabel `faq`.
- Kolom `active` bernilai `true` untuk FAQ yang mau ditampilkan.
- `HomeController` mengirim variabel `$faqs` ke `pages.home`.
- `sections/home/faq.blade.php` sudah render data dinamis.
