<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::query()
            ->where('type', 'blog')
            ->pluck('id', 'nama');

        $blogs = [
            [
                'category_id' => $categories['Engineering'] ?? 1,
                'slug' => 'memilih-tech-stack-2025',
                'title' => 'Cara Memilih Tech Stack yang Tepat untuk Proyek Digital Anda di 2025',
                'excerpt' => 'Memilih teknologi yang salah bisa membuang waktu dan uang. Pelajari framework pemilihan tech stack yang kami gunakan untuk klien enterprise.',
                'content' => '<p>Memilih tech stack adalah salah satu keputusan paling kritis dalam pengembangan produk digital. Keputusan yang salah di awal bisa berdampak panjang.</p><h3>1. Kesiapan Tim</h3><p>Tech stack terbaik adalah yang tim Anda kuasai. Tidak ada gunanya menggunakan teknologi terbaru jika tidak ada yang bisa mengembangkan atau memaintain-nya.</p><h3>2. Skalabilitas Jangka Panjang</h3><p>Pertimbangkan ke mana bisnis Anda akan berkembang dalam 3-5 tahun ke depan. Apakah teknologi yang dipilih mampu mengikuti pertumbuhan itu?</p><h3>3. Ekosistem &amp; Community</h3><p>Teknologi dengan ekosistem yang kuat berarti lebih banyak library, lebih mudah mencari developer, dan lebih cepat menyelesaikan masalah.</p><h3>4. Total Cost of Ownership</h3><p>Hitung tidak hanya biaya awal, tapi juga biaya hosting, lisensi, maintenance, dan rekrutmen di masa depan.</p>',
                'image' => [
                    'https://images.unsplash.com/photo-1579548122080-c35fd6820ecb?crop=entropy&cs=srgb&fm=jpg&w=1200&q=70',
                ],
                'active' => true,
            ],
            [
                'category_id' => $categories['Architecture'] ?? 1,
                'slug' => 'microservices-vs-monolith',
                'title' => 'Microservices vs Monolith: Mana yang Tepat untuk Bisnis Anda?',
                'excerpt' => 'Perdebatan klasik di dunia software development. Kami uraikan kapan Anda harus memilih microservices dan kapan monolith justru lebih bijak.',
                'content' => '<p>Perdebatan antara microservices dan monolith masih terus berlangsung. Tapi jawabannya selalu sama: "tergantung."</p><h3>Kapan Pilih Monolith</h3><ul><li>Tim kecil (kurang dari 10 developer)</li><li>Produk masih di fase validasi</li><li>Budget dan timeline terbatas</li></ul><h3>Kapan Pilih Microservices</h3><ul><li>Tim sudah cukup besar dan terorganisir per domain</li><li>Kebutuhan scaling berbeda per fitur</li><li>Reliability sangat kritis (uptime 99.9%+)</li></ul>',
                'image' => [
                    'https://images.pexels.com/photos/30547584/pexels-photo-30547584.jpeg?auto=compress&cs=tinysrgb&w=1200',
                ],
                'active' => true,
            ],
            [
                'category_id' => $categories['Business'] ?? 1,
                'slug' => 'roi-software-bisnis',
                'title' => 'Cara Menghitung ROI Investasi Software untuk Bisnis',
                'excerpt' => 'Banyak pebisnis ragu investasi di software karena tidak tahu cara mengukur hasilnya. Panduan lengkap menghitung ROI investasi digital.',
                'content' => '<p>Salah satu pertanyaan paling sering dari calon klien kami: "Bagaimana saya tahu investasi software ini worth it?"</p><h3>Formula ROI Software</h3><p><strong>ROI = (Manfaat - Investasi) / Investasi &times; 100%</strong></p><h3>Manfaat yang Bisa Diukur</h3><ul><li>Penghematan waktu tim dikali nilai per jam</li><li>Pengurangan error dan biaya koreksi</li><li>Peningkatan kapasitas transaksi</li><li>Pengurangan biaya operasional</li></ul>',
                'image' => [
                    'https://images.unsplash.com/photo-1562575214-da9fcf59b907?crop=entropy&cs=srgb&fm=jpg&w=1200&q=70',
                ],
                'active' => true,
            ],
            [
                'category_id' => $categories['Security'] ?? 1,
                'slug' => 'keamanan-aplikasi-web',
                'title' => '10 Praktik Keamanan Web yang Wajib Diterapkan di 2025',
                'excerpt' => 'Serangan siber semakin canggih. Pastikan aplikasi bisnis Anda terlindungi dengan praktik keamanan yang sudah terbukti efektif.',
                'content' => '<p>Keamanan aplikasi bukan lagi opsi &mdash; ini adalah keharusan.</p><h3>10 Praktik yang Kami Terapkan</h3><ul><li><strong>Input Validation</strong> &mdash; Jangan pernah percaya data dari user</li><li><strong>Authentication yang Kuat</strong> &mdash; Implementasi MFA sejak awal</li><li><strong>HTTPS Everywhere</strong> &mdash; Enkripsi semua komunikasi</li><li><strong>Least Privilege Principle</strong> &mdash; Akses minimal yang diperlukan</li><li><strong>Rate Limiting</strong> &mdash; Lindungi API dari abuse</li><li><strong>Penetration Testing</strong> &mdash; Uji sistem sebelum launch</li></ul>',
                'image' => [
                    'https://images.pexels.com/photos/30547568/pexels-photo-30547568.jpeg?auto=compress&cs=tinysrgb&w=1200',
                ],
                'active' => true,
            ],
            [
                'category_id' => $categories['Business'] ?? 1,
                'slug' => 'digitalisasi-umkm',
                'title' => 'Panduan Digitalisasi UMKM: Dari Mana Harus Mulai?',
                'excerpt' => 'Transformasi digital untuk UMKM tidak harus mahal atau rumit. Panduan langkah demi langkah dari identifikasi kebutuhan hingga implementasi.',
                'content' => '<p>Banyak pemilik UMKM ingin go digital tapi bingung harus mulai dari mana.</p><h3>Langkah 1: Audit Proses Manual</h3><p>Identifikasi proses mana yang paling banyak memakan waktu dan rentan error.</p><h3>Langkah 2: Prioritaskan Berdasarkan ROI</h3><p>Tidak semua proses perlu didigitalisasi sekarang. Fokus pada yang memberikan dampak terbesar.</p><h3>Langkah 3: Pilih Solusi yang Tepat</h3><p>Antara beli produk jadi atau bangun custom &mdash; keduanya punya kelebihan masing-masing.</p>',
                'image' => [
                    'https://images.unsplash.com/photo-1579548122080-c35fd6820ecb?crop=entropy&cs=srgb&fm=jpg&w=1200&q=70',
                ],
                'active' => true,
            ],
            [
                'category_id' => $categories['Engineering'] ?? 1,
                'slug' => 'api-first-development',
                'title' => 'API-First Development: Strategi Membangun Software yang Siap Integrasi',
                'excerpt' => 'Pendekatan API-first memungkinkan sistem Anda terhubung dengan ekosistem digital yang lebih luas.',
                'content' => '<p>API-first adalah filosofi pengembangan software di mana API dirancang dan didokumentasikan terlebih dahulu.</p><h3>Mengapa API-First Penting</h3><ul><li>Tim frontend dan backend bisa bekerja paralel</li><li>Lebih mudah diintegrasikan dengan sistem lain</li><li>Testing lebih mudah dan komprehensif</li><li>Dokumentasi lebih konsisten</li></ul><h3>Cara Memulai</h3><ul><li>Definisikan kontrak API menggunakan OpenAPI/Swagger</li><li>Review bersama semua stakeholder</li><li>Buat mock server dari kontrak</li><li>Mulai development paralel</li></ul>',
                'image' => [
                    'https://images.pexels.com/photos/30547584/pexels-photo-30547584.jpeg?auto=compress&cs=tinysrgb&w=1200',
                ],
                'active' => true,
            ],
        ];

        foreach ($blogs as $blog) {
            Blog::query()->updateOrCreate(
                ['slug' => $blog['slug']],
                $blog,
            );
        }
    }
}
