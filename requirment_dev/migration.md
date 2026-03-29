# Migration & Model Spec (Laravel 13)

Dokumen ini merangkum rencana migration + model berdasarkan diagram ERD terbaru.

## Aturan Implementasi

1. Nama tabel **pakai singular** (tanpa huruf `s` di belakang).
2. Nama kolom **disamakan** dengan diagram.
3. Semua migration mengikuti pola `BaseModelSoftDelete`.
4. Semua model wajib `use AuditBy`.
5. Style model mengikuti Laravel 13 (typed relation methods, casts via `casts()` method).

## Catatan Teknis Laravel

- Karena Laravel default-nya plural table name, semua model harus set `protected $table = 'nama_singular';`.
- Timestamps dan soft delete mengikuti standar base trait:
    - `created_at`, `updated_at`
    - `deleted_at`
- Foreign key dibuat dengan `foreignId(...)->constrained('table_singular')`.

---

## Daftar Tabel & Kolom

### 1) `category`

- `id` (PK)
- `nama` varchar(128)
- `type` varchar(128)
- `deskripsi` text nullable
- base columns (`timestamps`, `softDeletes`, audit cols jika ada di trait)

Relasi:

- hasMany `layanan`
- hasMany `portofolio`
- hasMany `klient`

---

### 2) `klient`

- `id` (PK)
- `nama` varchar(128)
- `logo` varchar(255)
- `category_id` (FK -> `category.id`)
- `deskripsi` text nullable
- base columns

Relasi:

- belongsTo `category`
- hasMany `testimoni`
- hasMany `portofolio`

---

### 3) `testimoni`

- `id` (PK)
- `klient_id` (FK -> `klient.id`)
- `nama` varchar(128)
- `foto` varchar(255)
- `jabatan` varchar(128) nullable
- `deskripsi` text
- base columns

Relasi:

- belongsTo `klient`

---

### 4) `faq`

- `id` (PK)
- `pertanyaan` varchar(255)
- `jawaban` text
- base columns

Relasi:

- none

---

### 5) `tools`

- `id` (PK)
- `nama` varchar(128)
- `logo` varchar(128)
- `deskripsi` text nullable
- base columns

Relasi:

- belongsToMany `layanan` via `layanan_tools`
- belongsToMany `portofolio` via `portofolio_tools`

---

### 6) `layanan`

- `id` (PK)
- `category_id` (FK -> `category.id`)
- `icon` varchar(255)
- `nama` varchar(255)
- `deskripsi` text
- `lingkup` json
- base columns

Relasi:

- belongsTo `category`
- belongsToMany `tools` via `layanan_tools`

---

### 7) `layanan_tools` (pivot)

- `id` (PK)
- `layanan_id` (FK -> `layanan.id`)
- `tools_id` (FK -> `tools.id`)
- base columns

Relasi:

- belongsTo `layanan`
- belongsTo `tools`

---

### 8) `portofolio`

- `id` (PK)
- `klient_id` (FK -> `klient.id`)
- `category_id` (FK -> `category.id`)
- `slug` varchar(255)
- `nama` varchar(255)
- `deskripsi` text
- `thumbnail` varchar(255)
- `foto` text nullable
- `tanggal_proyek` date
- base columns

Relasi:

- belongsTo `klient`
- belongsTo `category`
- belongsToMany `tools` via `portofolio_tools`

---

### 9) `portofolio_tools` (pivot)

- `id` (PK)
- `portofolio_id` (FK -> `portofolio.id`)
- `tools_id` (FK -> `tools.id`)
- base columns

Relasi:

- belongsTo `portofolio`
- belongsTo `tools`

---

### 10) `platform`

- `id` (PK)
- `nama` varchar(128)
- `logo` varchar(255)
- `no_whatsapp` varchar(18)
- `email` varchar(64)
- `alamat` text
- `sosial_media` json
- `sertifikat` json
- base columns

Relasi:

- none (sesuai diagram yang terlihat)

> Catatan: Di diagram terlihat `no_whatsapp` muncul dua kali. Implementasi disarankan pakai **satu** kolom `no_whatsapp`.

---

## Urutan Migration yang Disarankan

1. `create_category_table`
2. `create_platform_table`
3. `create_tools_table`
4. `create_faq_table`
5. `create_klient_table`
6. `create_layanan_table`
7. `create_portofolio_table`
8. `create_testimoni_table`
9. `create_layanan_tools_table`
10. `create_portofolio_tools_table`

---

## Standar Model (Laravel 13)

Setiap model:

- `use HasFactory, AuditBy;`
- `protected $table = 'nama_singular';`
- `protected $fillable = [...];`
- method `protected function casts(): array`
- relasi dengan return type (`BelongsTo`, `HasMany`, `BelongsToMany`)

Contoh pattern:

```php
<?php

namespace App\Models;

use App\Models\Traits\AuditBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use AuditedBySoftDelete, HasFactory, SoftDeletes;

    protected $table = 'faq';

    protected $fillable = [
        'pertanyaan',
        'jawaban',
    ];

    protected function casts(): array
    {
        return [];
    }
}
```

---

## Standar Migration (dengan BaseModelSoftDelete)

Semua migration pakai pola ini:

```php
eturn new class extends Migration
{
    use BaseModelSoftDeleteDefault;
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('satuan_obat', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 128);
            $table->text('deskripsi')->nullable();
            $this->base($table);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('satuan_obat');
    }
};
```

Jika project belum punya macro `baseModelSoftDelete()`, buat dulu di provider/blueprint macro sesuai trait yang dipakai tim.

---

## Next Step

Setelah dokumen ini disetujui, lanjut generate:

1. seluruh file migration sesuai urutan,
2. seluruh model + relasinya,
3. optional seeder awal untuk data master (`category`, `platform`, `faq`).
