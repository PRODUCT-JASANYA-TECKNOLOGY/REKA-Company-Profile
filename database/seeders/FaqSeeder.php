<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faqs = [
            [
                'pertanyaan' => 'Apa yang membedakan REKA dari vendor IT lainnya?',
                'jawaban' => 'REKA bukan sekadar vendor coding. Kami adalah mitra engineering yang memahami konteks bisnis Anda. Setiap solusi berangkat dari analisis kebutuhan bisnis yang mendalam. Kami berkomitmen pada kode yang bersih, terdokumentasi, dan mudah dikembangkan di masa depan.',
                'active' => true,
            ],
            [
                'pertanyaan' => 'Berapa lama waktu yang dibutuhkan untuk menyelesaikan proyek?',
                'jawaban' => 'Landing page atau website sederhana: 2-4 minggu. Aplikasi web dengan fitur standar: 6-12 minggu. Sistem enterprise atau platform kompleks: 3-6 bulan. Kami selalu memberikan estimasi realistis setelah proses discovery.',
                'active' => true,
            ],
            [
                'pertanyaan' => 'Apakah REKA menyediakan layanan maintenance setelah proyek selesai?',
                'jawaban' => 'Ya, kami menyediakan layanan maintenance dan support pasca-launch. Paket dukungan mencakup bug fixing, update keamanan, penambahan fitur kecil, dan monitoring performa.',
                'active' => true,
            ],
            [
                'pertanyaan' => 'Bagaimana proses pembayaran dan model harga REKA?',
                'jawaban' => 'Model project-based pricing dengan pembayaran bertahap sesuai milestone: 30% di awal, 40% saat mid-project, dan 30% saat serah terima. Untuk proyek jangka panjang, tersedia model retainer bulanan.',
                'active' => true,
            ],
            [
                'pertanyaan' => 'Teknologi apa saja yang dikuasai tim REKA?',
                'jawaban' => 'Frontend (React, Next.js), backend (Python/FastAPI, Node.js, Go), mobile (React Native, Flutter), database (PostgreSQL, MongoDB, Redis), dan infrastruktur (Docker, Kubernetes, AWS, GCP).',
                'active' => true,
            ],
            [
                'pertanyaan' => 'Apakah saya bisa mendapatkan konsultasi gratis?',
                'jawaban' => 'Tentu! Kami selalu menyediakan sesi konsultasi awal yang gratis dan tanpa komitmen. Tim kami akan mendengarkan kebutuhan Anda dan memberikan rekomendasi solusi terbaik.',
                'active' => true,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::query()->updateOrCreate(
                ['pertanyaan' => $faq['pertanyaan']],
                $faq,
            );
        }
    }
}
