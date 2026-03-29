# Setup Filament Resource (Laravel 13)

Dokumen ini jadi standar pembuatan Resource Filament untuk model project ini.

## 1) Generate Resource

Gunakan command berikut (bukan `pho`, tapi `php`):

```bash
php artisan make:filament-resource NamaModel --generate --soft-deletes
```

Untuk model di project ini:

```bash
php artisan make:filament-resource Category --generate --soft-deletes
php artisan make:filament-resource Platform --generate --soft-deletes
php artisan make:filament-resource Tools --generate --soft-deletes
php artisan make:filament-resource Faq --generate --soft-deletes
php artisan make:filament-resource Klient --generate --soft-deletes
php artisan make:filament-resource Layanan --generate --soft-deletes
php artisan make:filament-resource Portofolio --generate --soft-deletes
php artisan make:filament-resource Testimoni --generate --soft-deletes
php artisan make:filament-resource LayananTools --generate --soft-deletes
php artisan make:filament-resource PortofolioTools --generate --soft-deletes
```

Jika pakai Docker:

```bash
docker compose exec app php artisan make:filament-resource NamaModel --generate --soft-deletes
```

## 2) Standar Rapih Form

Setelah generate, rapikan form dengan aturan ini:

- Hapus field audit dari form: `created_by`, `updated_by`, `deleted_by`.
- Field relasi gunakan label manusiawi, bukan `id`.
- JSON field diinput dengan komponen yang jelas (mis. `Textarea`/`KeyValue` sesuai kebutuhan).
- `status_id` tetap ada karena ada di trait base migration.

Contoh relasi:

```php
Select::make('category_id')
    ->relationship('category', 'nama')
    ->searchable()
    ->preload()
    ->required();
```

## 3) Standar Kolom Audit di Table

Tambahkan kolom ini di table Resource:

```php
TextColumn::make('createdBy.name')
    ->label('Created By & When')
    ->badge()
    ->description(fn ($record) => $record->created_at?->format('d M Y'))
    ->sortable(),
TextColumn::make('updatedBy.name')
    ->label('Updated By & When')
    ->badge()
    ->description(fn ($record) => $record->updated_at?->format('d M Y'))
    ->sortable()
    ->toggleable(isToggledHiddenByDefault: true),
TextColumn::make('deletedBy.name')
    ->label('Deleted By & When')
    ->badge()
    ->description(fn ($record) => $record->deleted_at?->format('d M Y'))
    ->sortable()
    ->toggleable(isToggledHiddenByDefault: true),
```

## 4) Standar Label Resource (Singular)

Setiap Resource set properti label agar tidak auto plural:

```php
protected static ?string $model = Dokter::class;

protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUserPlus;

protected static string|\UnitEnum|null $navigationGroup = 'Data Klinik';

protected static ?string $navigationLabel = 'Dokter';

protected static ?string $modelLabel = 'Dokter';

protected static ?string $pluralModelLabel = 'Dokter';

protected static ?string $recordTitleAttribute = 'nama';
```

Catatan:
- `recordTitleAttribute` harus nama kolom yang benar-benar ada di tabel (contoh: `nama`, `pertanyaan`, dst).

## 5) Checklist Selesai

- Resource berhasil tergenerate.
- Form tidak menampilkan field audit.
- Table sudah punya 3 kolom audit relasi user.
- Label di menu dan model sudah singular.
- Soft delete filter dan action tetap aktif.
