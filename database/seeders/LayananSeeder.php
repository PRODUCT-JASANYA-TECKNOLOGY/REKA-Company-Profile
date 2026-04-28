<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Layanan;
use Illuminate\Database\Seeder;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::where('type', 'layanan')->pluck('id', 'nama');

        $layanans = [
            [
                'nama' => 'Custom Software Development',
                'category_id' => $categories['Aplikasi Web Internal'] ?? 1,
                'icon' => 'code-2',
                'deskripsi' => 'Pengembangan sistem software sesuai kebutuhan spesifik bisnis Anda — bukan template, tapi solusi yang dirancang khusus.',
                'lingkup' => [
                    'Konsultasi kebutuhan bisnis',
                    'Desain sistem & arsitektur',
                    'Development & QA testing',
                    'Deployment & dokumentasi',
                    'Post-launch support'
                ],
                'active' => true,
            ],
            [
                'nama' => 'Web Development',
                'category_id' => $categories['Website Company Profile'] ?? 1,
                'icon' => 'globe',
                'deskripsi' => 'Website company profile hingga web application kompleks yang performatif, aman, dan mudah dikelola.',
                'lingkup' => [
                    'UI/UX yang modern & konversional',
                    'SEO-ready & performatif',
                    'Responsive mobile-first',
                    'CMS integration (jika diperlukan)',
                    'Training pengelolaan konten'
                ],
                'active' => true,
            ],
            [
                'nama' => 'Mobile App Development',
                'category_id' => $categories['Aplikasi Web Internal'] ?? 1,
                'icon' => 'smartphone',
                'deskripsi' => 'Aplikasi Android dan iOS yang intuitif, cepat, dan siap untuk skala jutaan pengguna.',
                'lingkup' => [
                    'Desain UX yang intuitif',
                    'Publish ke App Store & Play Store',
                    'Push notification & analytics',
                    'Offline mode capability'
                ],
                'active' => true,
            ],
            [
                'nama' => 'System Architecture',
                'category_id' => $categories['Aplikasi Web Internal'] ?? 1,
                'icon' => 'server',
                'deskripsi' => 'Perancangan arsitektur sistem yang scalable, efisien, dan siap menghadapi pertumbuhan bisnis jangka panjang.',
                'lingkup' => [
                    'Architecture review & blueprint',
                    'Scalability planning',
                    'Security assessment',
                    'Technical documentation'
                ],
                'active' => true,
            ],
            [
                'nama' => 'DevOps & Automasi',
                'category_id' => $categories['Aplikasi Web Internal'] ?? 1,
                'icon' => 'workflow',
                'deskripsi' => 'CI/CD pipeline, deployment otomatis, dan workflow automation yang mempercepat delivery dan mengurangi human error.',
                'lingkup' => [
                    'CI/CD pipeline setup',
                    'Infrastructure as Code',
                    'Monitoring & alerting',
                    'Zero-downtime deployment'
                ],
                'active' => true,
            ],
            [
                'nama' => 'API & Integrasi Sistem',
                'category_id' => $categories['Integrasi API'] ?? 1,
                'icon' => 'plug',
                'deskripsi' => 'Menghubungkan sistem-sistem yang ada agar bekerja sebagai satu ekosistem yang mulus. Dari payment gateway hingga ERP, CRM, dan platform pihak ketiga.',
                'lingkup' => [
                    'API design & documentation',
                    'Third-party integration',
                    'Data migration & sync',
                    'API monitoring & logging'
                ],
                'active' => true,
            ],
        ];

        foreach ($layanans as $layanan) {
            Layanan::query()->updateOrCreate(
                [
                    'nama' => $layanan['nama'],
                ],
                $layanan
            );
        }
    }
}
