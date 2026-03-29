<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    private $artikelDB = [
        'memilih-tech-stack-2025' => [
            'id' => 'memilih-tech-stack-2025',
            'judul' => 'Cara Memilih Tech Stack yang Tepat untuk Proyek Digital Anda di 2025',
            'cat' => 'Engineering',
            'waktu' => '8 menit',
            'tanggal' => '15 Maret 2025',
            'img' => 'https://images.unsplash.com/photo-1579548122080-c35fd6820ecb?crop=entropy&cs=srgb&fm=jpg&w=1200&q=70',
            'excerpt' => 'Memilih teknologi yang salah bisa membuang waktu dan uang. Pelajari framework pemilihan tech stack yang kami gunakan untuk klien enterprise.',
            'isi' => '<p>Memilih tech stack adalah salah satu keputusan paling kritis dalam pengembangan produk digital. Keputusan yang salah di awal bisa berdampak panjang.</p><h3>1. Kesiapan Tim</h3><p>Tech stack terbaik adalah yang tim Anda kuasai. Tidak ada gunanya menggunakan teknologi terbaru jika tidak ada yang bisa mengembangkan atau memaintain-nya.</p><h3>2. Skalabilitas Jangka Panjang</h3><p>Pertimbangkan ke mana bisnis Anda akan berkembang dalam 3-5 tahun ke depan. Apakah teknologi yang dipilih mampu mengikuti pertumbuhan itu?</p><h3>3. Ekosistem &amp; Community</h3><p>Teknologi dengan ekosistem yang kuat berarti lebih banyak library, lebih mudah mencari developer, dan lebih cepat menyelesaikan masalah.</p><h3>4. Total Cost of Ownership</h3><p>Hitung tidak hanya biaya awal, tapi juga biaya hosting, lisensi, maintenance, dan rekrutmen di masa depan.</p>'
        ],
        'microservices-vs-monolith' => [
            'id' => 'microservices-vs-monolith',
            'judul' => 'Microservices vs Monolith: Mana yang Tepat untuk Bisnis Anda?',
            'cat' => 'Architecture',
            'waktu' => '10 menit',
            'tanggal' => '28 Februari 2025',
            'img' => 'https://images.pexels.com/photos/30547584/pexels-photo-30547584.jpeg?auto=compress&cs=tinysrgb&w=1200',
            'excerpt' => 'Perdebatan klasik di dunia software development. Kami uraikan kapan Anda harus memilih microservices dan kapan monolith justru lebih bijak.',
            'isi' => '<p>Perdebatan antara microservices dan monolith masih terus berlangsung. Tapi jawabannya selalu sama: "tergantung."</p><h3>Kapan Pilih Monolith</h3><ul><li>Tim kecil (kurang dari 10 developer)</li><li>Produk masih di fase validasi</li><li>Budget dan timeline terbatas</li></ul><h3>Kapan Pilih Microservices</h3><ul><li>Tim sudah cukup besar dan terorganisir per domain</li><li>Kebutuhan scaling berbeda per fitur</li><li>Reliability sangat kritis (uptime 99.9%+)</li></ul>'
        ],
        'roi-software-bisnis' => [
            'id' => 'roi-software-bisnis',
            'judul' => 'Cara Menghitung ROI Investasi Software untuk Bisnis',
            'cat' => 'Business',
            'waktu' => '6 menit',
            'tanggal' => '10 Februari 2025',
            'img' => 'https://images.unsplash.com/photo-1562575214-da9fcf59b907?crop=entropy&cs=srgb&fm=jpg&w=1200&q=70',
            'excerpt' => 'Banyak pebisnis ragu investasi di software karena tidak tahu cara mengukur hasilnya. Panduan lengkap menghitung ROI investasi digital.',
            'isi' => '<p>Salah satu pertanyaan paling sering dari calon klien kami: "Bagaimana saya tahu investasi software ini worth it?"</p><h3>Formula ROI Software</h3><p><strong>ROI = (Manfaat - Investasi) / Investasi &times; 100%</strong></p><h3>Manfaat yang Bisa Diukur</h3><ul><li>Penghematan waktu tim dikali nilai per jam</li><li>Pengurangan error dan biaya koreksi</li><li>Peningkatan kapasitas transaksi</li><li>Pengurangan biaya operasional</li></ul>'
        ],
        'keamanan-aplikasi-web' => [
            'id' => 'keamanan-aplikasi-web',
            'judul' => '10 Praktik Keamanan Web yang Wajib Diterapkan di 2025',
            'cat' => 'Security',
            'waktu' => '12 menit',
            'tanggal' => '20 Januari 2025',
            'img' => 'https://images.pexels.com/photos/30547568/pexels-photo-30547568.jpeg?auto=compress&cs=tinysrgb&w=1200',
            'excerpt' => 'Serangan siber semakin canggih. Pastikan aplikasi bisnis Anda terlindungi dengan praktik keamanan yang sudah terbukti efektif.',
            'isi' => '<p>Keamanan aplikasi bukan lagi opsi &mdash; ini adalah keharusan.</p><h3>10 Praktik yang Kami Terapkan</h3><ul><li><strong>Input Validation</strong> &mdash; Jangan pernah percaya data dari user</li><li><strong>Authentication yang Kuat</strong> &mdash; Implementasi MFA sejak awal</li><li><strong>HTTPS Everywhere</strong> &mdash; Enkripsi semua komunikasi</li><li><strong>Least Privilege Principle</strong> &mdash; Akses minimal yang diperlukan</li><li><strong>Rate Limiting</strong> &mdash; Lindungi API dari abuse</li><li><strong>Penetration Testing</strong> &mdash; Uji sistem sebelum launch</li></ul>'
        ],
        'digitalisasi-umkm' => [
            'id' => 'digitalisasi-umkm',
            'judul' => 'Panduan Digitalisasi UMKM: Dari Mana Harus Mulai?',
            'cat' => 'Business',
            'waktu' => '7 menit',
            'tanggal' => '5 Januari 2025',
            'img' => 'https://images.unsplash.com/photo-1579548122080-c35fd6820ecb?crop=entropy&cs=srgb&fm=jpg&w=1200&q=70',
            'excerpt' => 'Transformasi digital untuk UMKM tidak harus mahal atau rumit. Panduan langkah demi langkah dari identifikasi kebutuhan hingga implementasi.',
            'isi' => '<p>Banyak pemilik UMKM ingin go digital tapi bingung harus mulai dari mana.</p><h3>Langkah 1: Audit Proses Manual</h3><p>Identifikasi proses mana yang paling banyak memakan waktu dan rentan error.</p><h3>Langkah 2: Prioritaskan Berdasarkan ROI</h3><p>Tidak semua proses perlu didigitalisasi sekarang. Fokus pada yang memberikan dampak terbesar.</p><h3>Langkah 3: Pilih Solusi yang Tepat</h3><p>Antara beli produk jadi atau bangun custom &mdash; keduanya punya kelebihan masing-masing.</p>'
        ],
        'api-first-development' => [
            'id' => 'api-first-development',
            'judul' => 'API-First Development: Strategi Membangun Software yang Siap Integrasi',
            'cat' => 'Engineering',
            'waktu' => '9 menit',
            'tanggal' => '18 Desember 2024',
            'img' => 'https://images.pexels.com/photos/30547584/pexels-photo-30547584.jpeg?auto=compress&cs=tinysrgb&w=1200',
            'excerpt' => 'Pendekatan API-first memungkinkan sistem Anda terhubung dengan ekosistem digital yang lebih luas.',
            'isi' => '<p>API-first adalah filosofi pengembangan software di mana API dirancang dan didokumentasikan terlebih dahulu.</p><h3>Mengapa API-First Penting</h3><ul><li>Tim frontend dan backend bisa bekerja paralel</li><li>Lebih mudah diintegrasikan dengan sistem lain</li><li>Testing lebih mudah dan komprehensif</li><li>Dokumentasi lebih konsisten</li></ul><h3>Cara Memulai</h3><ul><li>Definisikan kontrak API menggunakan OpenAPI/Swagger</li><li>Review bersama semua stakeholder</li><li>Buat mock server dari kontrak</li><li>Mulai development paralel</li></ul>'
        ],
    ];

    public function index()
    {
        return view('pages.blog', [
            'articles' => collect($this->artikelDB),
            'featured' => $this->artikelDB['memilih-tech-stack-2025'] // mock featured article
        ]);
    }

    public function show($id)
    {
        if (!array_key_exists($id, $this->artikelDB)) {
            abort(404);
        }

        return view('pages.blog-detail', [
            'article' => $this->artikelDB[$id],
            'related' => collect($this->artikelDB)->except($id)->take(3)
        ]);
    }
}
