<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KlientSeeder extends Seeder
{
    public function run(): void
    {
        $klients = [
            [
                'nama' => 'Pesona Trip Travel Indonesia',
                'logo' => '',
                'category_id' => 3, // Perusahaan
            ],
            [
                'nama' => 'PT. Griya Maju Sentosa',
                'logo' => '',
                'category_id' => 3,
            ],
            [
                'nama' => 'SMK Patriot Nusantara',
                'logo' => '',
                'category_id' => 5, // Pendidikan
            ],
            [
                'nama' => 'PT Arthur Teknik',
                'logo' => '',
                'category_id' => 3,
            ],
            [
                'nama' => 'Growth Digital',
                'logo' => '',
                'category_id' => 2, // Startup
            ],
            [
                'nama' => 'PT Kristaplast Makmur Sejahtera',
                'logo' => '',
                'category_id' => 3,
            ],
            [
                'nama' => 'PT. Charlyn Jaya',
                'logo' => '',
                'category_id' => 3,
            ],
            [
                'nama' => 'Himpunan Mahasiswa Sistem Informasi UBSI',
                'logo' => '',
                'category_id' => 6, // Organisasi Nirlaba
            ],
            [
                'nama' => 'Klinik Dr. Fathia',
                'logo' => '',
                'category_id' => 1, // UMKM
            ],
            [
                'nama' => 'Dinas Pertamanan dan Hutan Kota Provinsi DKI Jakarta',
                'logo' => '',
                'category_id' => 4, // Instansi Pemerintah
            ],
        ];

        $now = now();

        DB::table('klient')->insert(array_map(static fn (array $klient) => [
            ...$klient,
            'active' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ], $klients));
    }
}
