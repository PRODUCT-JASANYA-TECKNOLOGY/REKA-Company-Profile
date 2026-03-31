<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $categories = [
            [
                'nama' => 'UMKM',
                'type' => 'klient',
                'deskripsi' => 'Klient skala usaha mikro, kecil, dan menengah.',
                'active' => true,
            ],
            [
                'nama' => 'Startup',
                'type' => 'klient',
                'deskripsi' => 'Klient perusahaan rintisan digital.',
                'active' => true,
            ],
            [
                'nama' => 'Perusahaan',
                'type' => 'klient',
                'deskripsi' => 'Klient perusahaan skala nasional maupun multinasional.',
                'active' => true,
            ],
            [
                'nama' => 'Instansi Pemerintah',
                'type' => 'klient',
                'deskripsi' => 'Klient dari lembaga pemerintahan pusat maupun daerah.',
                'active' => true,
            ],
            [
                'nama' => 'Pendidikan',
                'type' => 'klient',
                'deskripsi' => 'Klient dari lembaga pendidikan.',
                'active' => true,
            ],
            [
                'nama' => 'Organisasi Nirlaba',
                'type' => 'klient',
                'deskripsi' => 'Klient komunitas dan organisasi non-profit.',
                'active' => true,
            ],
            [
                'nama' => 'Website Company Profile',
                'type' => 'layanan',
                'deskripsi' => 'Pembuatan website profil perusahaan.',
                'active' => true,
            ],
            [
                'nama' => 'Website Toko Online',
                'type' => 'layanan',
                'deskripsi' => 'Pembuatan dan pengembangan website e-commerce.',
                'active' => true,
            ],
            [
                'nama' => 'Landing Page',
                'type' => 'layanan',
                'deskripsi' => 'Pembuatan halaman promosi untuk kampanye digital.',
                'active' => true,
            ],
            [
                'nama' => 'Aplikasi Web Internal',
                'type' => 'layanan',
                'deskripsi' => 'Pengembangan aplikasi web untuk kebutuhan operasional internal.',
                'active' => true,
            ],
            [
                'nama' => 'Integrasi API',
                'type' => 'layanan',
                'deskripsi' => 'Layanan integrasi sistem antar aplikasi melalui API.',
                'active' => true,
            ],
            [
                'nama' => 'Website Sekolah',
                'type' => 'portofolio',
                'deskripsi' => 'Portofolio proyek website untuk lembaga pendidikan.',
                'active' => true,
            ],
            [
                'nama' => 'Aplikasi Reservasi',
                'type' => 'portofolio',
                'deskripsi' => 'Portofolio aplikasi pemesanan dan penjadwalan layanan.',
                'active' => true,
            ],
            [
                'nama' => 'Dashboard Analitik',
                'type' => 'portofolio',
                'deskripsi' => 'Portofolio dashboard pelaporan dan visualisasi data.',
                'active' => true,
            ],
            [
                'nama' => 'Sistem Inventori',
                'type' => 'portofolio',
                'deskripsi' => 'Portofolio sistem manajemen stok dan inventori.',
                'active' => true,
            ],
            [
                'nama' => 'Website Event',
                'type' => 'portofolio',
                'deskripsi' => 'Portofolio website event dan pendaftaran peserta.',
                'active' => true,
            ],
        ];

        foreach ($categories as $category) {
            Category::query()->updateOrCreate(
                [
                    'nama' => $category['nama'],
                    'type' => $category['type'],
                ],
                $category,
            );
        }
    }
}
