<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestimoniSeeder extends Seeder
{
    public function run(): void
    {
        $testimonis = [
            [
                'klient_id' => 1, // Pesona Trip Travel Indonesia
                'nama'      => 'Budi Santoso',
                'jabatan'   => 'CEO',
                'foto'      => 'https://i.pravatar.cc/150?img=1',
                'deskripsi' => 'Tim REKA sangat profesional dan responsif. Sistem pemesanan travel kami sekarang jauh lebih efisien dan pelanggan kami pun merasa puas dengan pengalaman digitalnya.',
            ],
            [
                'klient_id' => 2, // PT. Griya Maju Sentosa
                'nama'      => 'Dewi Rahayu',
                'jabatan'   => 'Direktur Operasional',
                'foto'      => 'https://i.pravatar.cc/150?img=2',
                'deskripsi' => 'Hasil kerja REKA melampaui ekspektasi kami. Sistem manajemen properti yang dibangun sangat mudah digunakan oleh seluruh tim.',
            ],
            [
                'klient_id' => 3, // SMK Patriot Nusantara
                'nama'      => 'Agus Firmansyah',
                'jabatan'   => 'Kepala Sekolah',
                'foto'      => 'https://i.pravatar.cc/150?img=3',
                'deskripsi' => 'Aplikasi absensi dan akademik yang dibuat REKA sangat membantu pengelolaan sekolah kami. Orang tua siswa pun bisa memantau perkembangan anak dengan mudah.',
            ],
            [
                'klient_id' => 4, // PT Arthur Teknik
                'nama'      => 'Hendra Wijaya',
                'jabatan'   => 'General Manager',
                'foto'      => 'https://i.pravatar.cc/150?img=4',
                'deskripsi' => 'REKA membantu kami membangun sistem monitoring proyek yang terintegrasi. Pengerjaan cepat, kualitas tidak diragukan lagi.',
            ],
            [
                'klient_id' => 5, // Growth Digital
                'nama'      => 'Rini Kusuma',
                'jabatan'   => 'Co-Founder',
                'foto'      => 'https://i.pravatar.cc/150?img=5',
                'deskripsi' => 'Kolaborasi yang luar biasa! REKA benar-benar mengerti kebutuhan startup kami. Produk yang dihasilkan scalable dan siap berkembang bersama bisnis kami.',
            ],
            [
                'klient_id' => 6, // PT Kristaplast Makmur Sejahtera
                'nama'      => 'Slamet Purnomo',
                'jabatan'   => 'Manajer IT',
                'foto'      => 'https://i.pravatar.cc/150?img=6',
                'deskripsi' => 'Sistem inventory dan produksi yang dibangun REKA sangat membantu efisiensi operasional pabrik kami. Dukungan teknis juga sangat baik.',
            ],
            [
                'klient_id' => 7, // PT. Charlyn Jaya
                'nama'      => 'Lia Anggraeni',
                'jabatan'   => 'Head of Marketing',
                'foto'      => 'https://i.pravatar.cc/150?img=7',
                'deskripsi' => 'Website company profile kami tampak lebih modern dan profesional berkat REKA. Banyak klien kami yang memberikan kesan positif sejak website baru diluncurkan.',
            ],
            [
                'klient_id' => 8, // Himpunan Mahasiswa Sistem Informasi UBSI
                'nama'      => 'Fajar Nugroho',
                'jabatan'   => 'Ketua Himpunan',
                'foto'      => 'https://i.pravatar.cc/150?img=8',
                'deskripsi' => 'Platform event dan keanggotaan yang dibuat REKA sangat memudahkan koordinasi kegiatan organisasi kami. Tim mereka juga sangat ramah dan helpful.',
            ],
            [
                'klient_id' => 9, // Klinik Dr. Fathia
                'nama'      => 'dr. Fathia Nuraini',
                'jabatan'   => 'Pemilik Klinik',
                'foto'      => 'https://i.pravatar.cc/150?img=9',
                'deskripsi' => 'Sistem antrian dan rekam medis dari REKA sangat membantu pelayanan klinik kami. Pasien lebih tertib dan data medis lebih terorganisir.',
            ],
            [
                'klient_id' => 10, // Dinas Pertamanan dan Hutan Kota Provinsi DKI Jakarta
                'nama'      => 'Ir. Bambang Susanto',
                'jabatan'   => 'Kepala Bidang',
                'foto'      => 'https://i.pravatar.cc/150?img=10',
                'deskripsi' => 'Sistem informasi geografis yang dikembangkan REKA sangat membantu kami dalam pengelolaan data ruang terbuka hijau di DKI Jakarta.',
            ],
        ];

        $now = now();

        DB::table('testimoni')->insert(array_map(static fn (array $testimoni) => [
            ...$testimoni,
            'active'     => true,
            'created_at' => $now,
            'updated_at' => $now,
        ], $testimonis));
    }
}
