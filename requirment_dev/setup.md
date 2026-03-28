# Brief Setup Development

Dokumen ini berisi alur cepat untuk setup **Laravel 13**, **Docker**, dan **GitHub workflow**.

## 1. Setup Awal (Laravel 13 + Docker)

### Prasyarat
- Docker Desktop (atau Docker Engine + Docker Compose)
- Git
- GitHub CLI (`gh`)
- Akun GitHub sudah login di terminal (`gh auth login`)

### Struktur Dasar
- Gunakan project Laravel 13 di dalam container Docker.
- Service minimal:
  - `app` (PHP + Composer)
  - `web` (Nginx)
  - `db` (MySQL/PostgreSQL)

### Langkah Setup
1. Buat repository di GitHub.
2. Clone repository ke lokal.
3. Inisialisasi Laravel 13 di folder project.
4. Tambahkan konfigurasi Docker (`Dockerfile`, `docker-compose.yml`, dan config web server).
5. Jalankan container dan validasi aplikasi bisa diakses.
6. Simpan `.env.example` yang sesuai untuk environment Docker.

## 2. Flow Kerja GitHub (Issue -> Code -> Test -> Commit)

### A. Buat Issue Dulu
Gunakan GitHub CLI untuk membuat issue sebelum mulai coding:

```bash
gh issue create --title "Setup initial Laravel 13 + Docker" --body "Inisialisasi project Laravel 13, dockerize app, dan validasi local run."
```

Catat nomor issue, misalnya `#12`.

### B. Eksekusi Kode
- Buat branch dari issue:

```bash
git checkout -b feat/12-setup-laravel-docker
```

- Lakukan implementasi sesuai scope issue.

### C. Testing Dulu (oleh Anda)
Sebelum commit, jalankan testing/validasi lokal dulu:
- Build dan up container
- Cek aplikasi berjalan
- Jalankan test Laravel (jika sudah tersedia)

Contoh:

```bash
docker compose up -d --build
docker compose exec app php artisan test
```

### D. Commit Setelah Test Lolos
Setelah Anda konfirmasi test aman, lakukan commit:

```bash
git add .
git commit -m "feat: setup Laravel 13 with Docker refs #12"
```

### E. Push & (Opsional) Buat PR via GH CLI

```bash
git push -u origin feat/12-setup-laravel-docker
gh pr create --title "feat: setup Laravel 13 with Docker" --body "Implements #12"
```

## 3. Aturan Singkat Tim
- Selalu mulai dari issue.
- Satu issue, satu branch fokus.
- **Testing dilakukan sebelum commit**.
- Format commit message jelas dan refer ke nomor issue.
