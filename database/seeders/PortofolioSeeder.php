<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Klient;
use App\Models\Portofolio;
use App\Models\Tools;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PortofolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::where('type', 'portofolio')->pluck('id', 'nama');
        $klients = Klient::pluck('id', 'nama');
        $tools = Tools::pluck('id', 'nama');

        $portofolios = [
            [
                'nama' => 'Platform SupplyOps',
                'klient_id' => $klients['PT Arthur Teknik'] ?? 4,
                'category_id' => $categories['Sistem Inventori'] ?? 15,
                'deskripsi' => 'Sistem manajemen rantai pasok terpadu untuk perusahaan distribusi nasional dengan 200+ pengguna aktif.',
                'thumbnail' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=800&q=70',
                'tanggal_proyek' => '2024-03-15',
                'tools' => ['React', 'Node.js', 'PostgreSQL'],
                'active' => true,
            ],
            [
                'nama' => 'HealthLink Portal',
                'klient_id' => $klients['Klinik Dr. Fathia'] ?? 9,
                'category_id' => $categories['Aplikasi Reservasi'] ?? 13,
                'deskripsi' => 'Platform digital yang menghubungkan 12 klinik dalam satu ekosistem — dari rekam medis hingga jadwal dokter.',
                'thumbnail' => 'https://images.unsplash.com/photo-1576091160550-2173dba999ef?w=800&q=70',
                'tanggal_proyek' => '2024-01-20',
                'tools' => ['TypeScript', 'AWS'],
                'active' => true,
            ],
            [
                'nama' => 'TradeSense API Gateway',
                'klient_id' => $klients['Growth Digital'] ?? 5,
                'category_id' => $categories['Dashboard Analitik'] ?? 14,
                'deskripsi' => 'Infrastruktur API keuangan dengan kemampuan memproses transaksi Rp30M+ per hari.',
                'thumbnail' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=800&q=70',
                'tanggal_proyek' => '2023-11-10',
                'tools' => ['Go', 'Redis'],
                'active' => true,
            ],
            [
                'nama' => 'EduTrack LMS',
                'klient_id' => $klients['SMK Patriot Nusantara'] ?? 3,
                'category_id' => $categories['Website Sekolah'] ?? 12,
                'deskripsi' => 'Learning Management System untuk institusi pendidikan dengan kelas virtual, ujian online, dan analitik performa.',
                'thumbnail' => 'https://images.unsplash.com/photo-1501504905252-473c47e087f8?w=800&q=70',
                'tanggal_proyek' => '2023-08-05',
                'tools' => ['Next.js', 'Python', 'MongoDB'],
                'active' => true,
            ],
            [
                'nama' => 'Logistik Mobile App',
                'klient_id' => $klients['PT. Griya Maju Sentosa'] ?? 2,
                'category_id' => $categories['Sistem Inventori'] ?? 15,
                'deskripsi' => 'Aplikasi tracking pengiriman real-time untuk armada 300+ kurir dengan fitur POD digital dan navigasi terintegrasi.',
                'thumbnail' => 'https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?w=800&q=70',
                'tanggal_proyek' => '2024-02-28',
                'tools' => ['React Native', 'Node.js', 'Firebase'],
                'active' => true,
            ],
        ];

        foreach ($portofolios as $p) {
            $toolsList = $p['tools'];
            unset($p['tools']);
            
            $p['slug'] = Str::slug($p['nama']);

            $portofolio = Portofolio::query()->updateOrCreate(
                ['slug' => $p['slug']],
                $p
            );

            // Sync tools
            $toolIds = [];
            foreach ($toolsList as $toolName) {
                if (isset($tools[$toolName])) {
                    $toolIds[] = $tools[$toolName];
                }
            }
            $portofolio->tools()->sync($toolIds);
        }
    }
}
