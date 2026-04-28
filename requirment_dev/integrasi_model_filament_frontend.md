# Standar Integrasi Data Model + Filament ke Frontend

Dokumen ini menjadi standar integrasi data dari **Model Eloquent** dan **panel admin Filament** ke halaman frontend Laravel.

Tujuan utama:

- data dikelola dari panel admin Filament,
- frontend hanya membaca data yang sudah valid dan siap tampil,
- **Blade tidak berisi kode PHP untuk query, mapping, formatting, atau business logic**,
- struktur project tetap rapih, testable, dan mudah dirawat.

---

## 1. Prinsip Utama

### A. Filament hanya untuk CRUD admin

Filament Resource bertugas untuk:

- membuat dan mengubah data,
- validasi input admin,
- mengatur relasi dan field form,
- mengatur tabel admin,
- tidak dipakai sebagai tempat logika tampilan frontend.

Artinya:

- jangan ambil data frontend langsung dari class Resource Filament,
- jangan taruh logic presentasi halaman publik di `app/Filament/...`.

### B. Model menyimpan aturan data inti

Model bertugas untuk:

- definisi nama tabel,
- relasi,
- casts,
- local scope query yang reusable,
- accessor sederhana jika memang benar-benar atribut model.

Model **bukan** tempat untuk menyusun payload final halaman frontend yang kompleks.

### C. Controller jangan terlalu gemuk

Controller frontend hanya boleh:

- menerima request,
- memanggil query/service class,
- menerima hasil yang sudah siap render,
- mengirim data ke view.

Controller tidak boleh penuh dengan:

- query berulang,
- `map()`, `filter()`, `groupBy()` yang panjang,
- formatting string untuk UI,
- logika transformasi gambar, badge, CTA, dan sejenisnya.

### D. Blade hanya untuk render

Blade hanya boleh berisi:

- `@extends`, `@section`, `@include`, `@foreach`, `@if`,
- output data dengan `{{ }}`,
- pemanggilan komponen,
- struktur HTML dan class CSS.

Blade **tidak boleh** berisi:

- query model,
- `@php ... @endphp`,
- `app(...)`,
- `request(...)`,
- `collect(...)`,
- `Str::...`,
- `asset(...)` untuk membangun data dinamis dari record,
- `nl2br(e(...))`,
- `map`, `filter`, `reduce`, `sortBy`,
- logika penentuan fallback, active state, atau formatting kompleks.

Semua kebutuhan itu harus disiapkan sebelum data masuk ke view.

---

## 2. Arsitektur yang Dipakai

Gunakan alur berikut untuk semua halaman frontend yang datanya berasal dari admin:

```text
Filament Form
   -> simpan ke Model
   -> Model + Scope/Relation
   -> Query/Service Frontend
   -> DTO / ViewData / Presenter
   -> Controller
   -> Blade
```

### Layer yang disarankan

#### 1) Model

Lokasi:

```text
app/Models/
```

Tanggung jawab:

- relasi,
- casts,
- scope seperti `active()`, `published()`, `featured()`,
- accessor yang benar-benar atribut model.

Contoh:

```php
public function scopeActive(Builder $query): Builder
{
    return $query->where('active', true);
}
```

#### 2) Query / Service class frontend

Lokasi yang disarankan:

```text
app/Support/Frontend/
app/Actions/Frontend/
app/Services/Frontend/
```

Pilih salah satu dan konsisten. Rekomendasi untuk project ini:

```text
app/Actions/Frontend/
```

Tanggung jawab:

- ambil data dari model,
- eager load relasi,
- filter hanya data yang boleh tampil di website,
- urutkan data,
- bentuk payload awal untuk frontend.

#### 3) DTO / ViewData / Presenter

Lokasi yang disarankan:

```text
app/ViewData/
app/Data/
```

Rekomendasi untuk project ini:

```text
app/ViewData/
```

Tanggung jawab:

- mengubah model menjadi data final yang siap dipakai Blade,
- memastikan Blade tidak perlu formatting tambahan,
- menyimpan field yang memang dibutuhkan view saja.

Contoh field siap render:

- `title`
- `description_html`
- `image_url`
- `cta_url`
- `cta_label`
- `is_active`
- `items`

#### 4) Controller

Lokasi:

```text
app/Http/Controllers/
```

Tanggung jawab:

- panggil action/query class,
- kirim hasil ke view.

#### 5) Blade

Lokasi:

```text
resources/views/
```

Tanggung jawab:

- render HTML dari data siap pakai.

---

## 3. Standar Data Frontend

Semua data yang akan tampil di website wajib memenuhi aturan ini:

- hanya ambil data yang `active = true` bila tabel mendukung flag aktif,
- hanya ambil data yang tidak soft deleted,
- relasi wajib `eager loading`,
- sorting harus eksplisit,
- limit harus eksplisit bila section memang terbatas,
- frontend tidak boleh menebak fallback data.

Jika sebuah halaman butuh fallback, fallback itu disiapkan di layer `ViewData` atau `Action`, bukan di Blade.

Contoh:

- logo kosong -> siapkan `logo_url` dan `logo_fallback_label` di presenter,
- FAQ multiline -> siapkan `jawaban_html` di presenter,
- navbar active state -> siapkan state dari controller/component class, bukan `request()->routeIs(...)` di view.

---

## 4. Aturan Khusus Blade

### Yang diperbolehkan

```blade
@foreach ($faqs as $faq)
    <h3>{{ $faq->pertanyaan }}</h3>
    {!! $faq->jawaban_html !!}
@endforeach
```

### Yang tidak diperbolehkan

```blade
@php
    $items = \App\Models\Faq::query()->where('active', true)->get();
@endphp
```

```blade
<p>{!! nl2br(e($faq->jawaban)) !!}</p>
```

```blade
<a class="{{ request()->routeIs('home') ? 'active' : '' }}">
```

```blade
{{ asset('storage/' . ltrim($item->image, '/')) }}
```

Semua contoh di atas harus dipindahkan ke layer PHP di luar Blade.

---

## 5. Struktur Folder yang Disarankan

```text
app/
├── Actions/
│   └── Frontend/
│       ├── GetHomePageData.php
│       ├── GetLayananPageData.php
│       ├── GetPortofolioPageData.php
│       └── GetBlogPageData.php
│
├── ViewData/
│   ├── Home/
│   │   ├── FaqItemData.php
│   │   ├── KlientLogoData.php
│   │   └── HomePageData.php
│   ├── Layanan/
│   └── Portofolio/
│
└── Models/
```

Struktur ini membuat:

- query tetap reusable,
- payload view tetap eksplisit,
- Blade tetap bersih.

---

## 6. Pola Implementasi Standar

### A. Model

Gunakan model untuk relasi, casts, dan scope reusable.

Contoh:

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('active', true);
    }
}
```

### B. Action untuk ambil data halaman

Contoh:

```php
<?php

namespace App\Actions\Frontend;

use App\Models\Faq;
use App\ViewData\Home\FaqItemData;

class GetHomePageData
{
    public function execute(): array
    {
        $faqs = Faq::query()
            ->active()
            ->orderBy('id')
            ->get()
            ->map(fn (Faq $faq) => FaqItemData::fromModel($faq));

        return [
            'faqs' => $faqs,
        ];
    }
}
```

### C. ViewData untuk data siap render

Contoh:

```php
<?php

namespace App\ViewData\Home;

use App\Models\Faq;

class FaqItemData
{
    public function __construct(
        public string $pertanyaan,
        public string $jawabanHtml,
    ) {}

    public static function fromModel(Faq $faq): self
    {
        return new self(
            pertanyaan: $faq->pertanyaan,
            jawabanHtml: nl2br(e($faq->jawaban)),
        );
    }
}
```

Catatan:

- formatting seperti `nl2br(e(...))` dilakukan di class ini,
- Blade tinggal render field hasil akhirnya.

### D. Controller

Contoh:

```php
<?php

namespace App\Http\Controllers;

use App\Actions\Frontend\GetHomePageData;

class HomeController extends Controller
{
    public function index(GetHomePageData $getHomePageData)
    {
        return view('pages.home', $getHomePageData->execute());
    }
}
```

### E. Blade

Contoh:

```blade
@foreach ($faqs as $faq)
    <div class="faq-item">
        <h3>{{ $faq->pertanyaan }}</h3>
        {!! $faq->jawabanHtml !!}
    </div>
@endforeach
```

Blade di atas hanya render. Tidak ada query, helper formatting, atau business logic.

---

## 7. Aturan Integrasi dari Filament ke Frontend

### A. Semua field frontend harus didefinisikan jelas di admin

Jika data akan tampil di website, field yang relevan harus tersedia dan tervalidasi di Filament, misalnya:

- `nama`
- `slug`
- `deskripsi`
- `thumbnail`
- `foto`
- `active`
- `featured`
- `urutan`
- `published_at`

Jika frontend butuh kontrol tampil/sembunyi, jangan andalkan hardcode di Blade. Buat field yang jelas di database dan form admin.

### B. Gunakan nama field yang mendukung frontend

Disarankan menambah field berikut bila memang dibutuhkan oleh halaman publik:

- `active` boolean
- `featured` boolean
- `urutan` unsigned integer nullable
- `slug` untuk halaman detail
- `excerpt` untuk ringkasan
- `published_at` untuk konten terbit

### C. Filament memvalidasi, frontend mengonsumsi

Contoh:

- Filament memastikan `thumbnail` wajib,
- Action/frontend class menyiapkan `thumbnail_url`,
- Blade cukup render `<img src="{{ $item->thumbnailUrl }}">`.

### D. Jangan gunakan konfigurasi view publik di Resource

Yang tidak disarankan:

- logic pemilihan item homepage di Resource Filament,
- helper frontend di file `Resource`,
- query untuk halaman publik di `Tables` atau `Schemas`.

---

## 8. Eager Loading dan Query Best Practice

Semua query frontend wajib mengikuti aturan ini:

- pakai `select()` jika field tabel besar dan section hanya butuh sebagian kolom,
- pakai `with()` untuk relasi,
- hindari N+1 query,
- hindari query di dalam loop Blade,
- grouping/filtering berat dilakukan sebelum view.

Contoh:

```php
$portofolios = Portofolio::query()
    ->select(['id', 'klient_id', 'category_id', 'slug', 'nama', 'deskripsi', 'thumbnail', 'tanggal_proyek'])
    ->with(['klient:id,nama,logo', 'category:id,nama', 'tools:id,nama,logo'])
    ->where('active', true)
    ->orderByDesc('tanggal_proyek')
    ->get();
```

---

## 9. Standar Output untuk View

Data yang dikirim ke Blade sebaiknya berupa salah satu dari ini:

### Opsi A. DTO / ViewData object

Cocok untuk:

- halaman dengan banyak formatting,
- data dari beberapa model,
- reusable section.

### Opsi B. Array yang sudah rapi

Cocok untuk:

- section sederhana,
- payload kecil,
- tidak butuh method tambahan.

Rekomendasi untuk project ini:

- gunakan **ViewData object** untuk section utama,
- gunakan array hanya untuk kasus kecil.

---

## 10. Contoh Standar Per Halaman

### Home

Sumber data yang umum:

- `Faq`
- `Klient`
- `Category`
- `Layanan`
- `Testimoni`

Controller:

- panggil satu action `GetHomePageData`

Action:

- ambil semua data section home

ViewData:

- ubah masing-masing record menjadi object siap render

Blade:

- hanya include section dan render variable

### Layanan

Sumber data:

- `Layanan`
- `Category`
- `Tools`

Aturan:

- deskripsi card, icon URL, dan daftar tools harus sudah siap dari presenter,
- Blade tidak melakukan join visual atau formatting JSON `lingkup`.

### Portofolio

Sumber data:

- `Portofolio`
- `Klient`
- `Category`
- `Tools`

Aturan:

- gallery URL, label kategori, dan daftar tools disiapkan di presenter,
- Blade tidak membangun URL storage manual.

---

## 11. Standar untuk Komponen Navigasi dan Shared Component

Karena Blade harus minim logic, shared component seperti navbar/footer juga harus mengikuti aturan berikut:

- item menu disiapkan dari config atau presenter,
- state aktif tidak dihitung di dalam Blade,
- URL final dan label final disiapkan sebelum render.

Rekomendasi:

- buat data menu dari config atau dedicated view composer,
- jika perlu state aktif, siapkan field `isActive`.

Contoh payload:

```php
[
    ['label' => 'Beranda', 'url' => route('home'), 'isActive' => true],
    ['label' => 'Layanan', 'url' => route('layanan'), 'isActive' => false],
]
```

Blade:

```blade
@foreach ($menuItems as $item)
    <a href="{{ $item['url'] }}" class="{{ $item['isActive'] ? 'text-gray-950' : 'text-gray-500' }}">
        {{ $item['label'] }}
    </a>
@endforeach
```

Jika tim ingin lebih ketat lagi, class string final juga bisa disiapkan di presenter agar Blade tidak punya conditional class.

---

## 12. Aturan Naming

Gunakan penamaan berikut agar konsisten:

- Action: `GetHomePageData`, `GetLayananPageData`
- ViewData item: `FaqItemData`, `LayananCardData`, `PortofolioCardData`
- ViewData page: `HomePageData`, `LayananPageData`
- Scope model: `active`, `featured`, `published`

Hindari nama generik seperti:

- `Helper`
- `Utils`
- `CommonService`
- `DataManager`

---

## 13. Checklist Implementasi

Sebelum integrasi data dianggap selesai, pastikan:

- data dikelola dari model dan admin Filament,
- field untuk kebutuhan tampil/sort/filter tersedia di database,
- query frontend tidak ditulis di Blade,
- tidak ada `@php` di view,
- tidak ada formatting UI di Blade,
- controller hanya tipis,
- relasi sudah eager load,
- payload yang dikirim ke view sudah siap render,
- semua section fallback disiapkan di layer PHP,
- Blade hanya render HTML.

---

## 14. Checklist Review Code

Saat review PR, tolak implementasi jika ditemukan hal berikut:

- `App\Models\...` dipanggil langsung di Blade,
- `request()` dipakai di Blade untuk state UI,
- `asset('storage/...')` dibangun dari record di Blade,
- `nl2br`, `e`, `Str`, `collect`, `map`, `filter` muncul di file Blade,
- controller berisi transformasi data panjang,
- query frontend tersebar di banyak controller padahal bisa dipusatkan,
- logic frontend ditaruh di Filament Resource.

---

## 15. Standar Final untuk Project Ini

Untuk project ini, standar yang dipakai ke depan adalah:

1. Data dikelola melalui Model + Filament Resource.
2. Frontend mengambil data melalui `Action` khusus per halaman.
3. Data view dibentuk melalui `ViewData` object.
4. Controller hanya menghubungkan action ke view.
5. Blade hanya untuk render, tanpa query dan tanpa kode PHP presentational.

Dengan standar ini, frontend tetap bersih, data dari admin tetap terstruktur, dan pengembangan halaman publik akan lebih aman untuk dipelihara dalam jangka panjang.
