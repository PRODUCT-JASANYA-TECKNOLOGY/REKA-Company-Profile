<?php

namespace Database\Seeders;

use App\Models\Tools;
use Illuminate\Database\Seeder;

class ToolsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tools = [
            [
                'nama' => 'PHP',
                'logo' => 'https://raw.githubusercontent.com/devicons/devicon/master/icons/php/php-original.svg',
                'deskripsi' => 'Bahasa pemrograman server-side yang populer untuk pengembangan web.',
            ],
            [
                'nama' => 'Laravel',
                'logo' => 'https://raw.githubusercontent.com/devicons/devicon/master/icons/laravel/laravel-original.svg',
                'deskripsi' => 'Framework PHP modern dengan sintaks yang elegan dan ekspresif.',
            ],
            [
                'nama' => 'JavaScript',
                'logo' => 'https://raw.githubusercontent.com/devicons/devicon/master/icons/javascript/javascript-original.svg',
                'deskripsi' => 'Bahasa pemrograman tingkat tinggi dan dinamis untuk pengembangan web.',
            ],
            [
                'nama' => 'Node.js',
                'logo' => 'https://raw.githubusercontent.com/devicons/devicon/master/icons/nodejs/nodejs-original.svg',
                'deskripsi' => 'Runtime environment JavaScript yang dibangun di atas mesin V8 Chrome.',
            ],
            [
                'nama' => 'React',
                'logo' => 'https://raw.githubusercontent.com/devicons/devicon/master/icons/react/react-original.svg',
                'deskripsi' => 'Library JavaScript untuk membangun antarmuka pengguna (UI).',
            ],
            [
                'nama' => 'Vue.js',
                'logo' => 'https://raw.githubusercontent.com/devicons/devicon/master/icons/vuejs/vuejs-original.svg',
                'deskripsi' => 'Framework JavaScript progresif untuk membangun antarmuka pengguna.',
            ],
            [
                'nama' => 'TypeScript',
                'logo' => 'https://raw.githubusercontent.com/devicons/devicon/master/icons/typescript/typescript-original.svg',
                'deskripsi' => 'Superset JavaScript yang menambahkan tipe statis opsional.',
            ],
            [
                'nama' => 'Python',
                'logo' => 'https://raw.githubusercontent.com/devicons/devicon/master/icons/python/python-original.svg',
                'deskripsi' => 'Bahasa pemrograman serbaguna yang menekankan pada keterbacaan kode.',
            ],
            [
                'nama' => 'Docker',
                'logo' => 'https://raw.githubusercontent.com/devicons/devicon/master/icons/docker/docker-original.svg',
                'deskripsi' => 'Platform untuk mengembangkan, mengirim, dan menjalankan aplikasi dalam kontainer.',
            ],
            [
                'nama' => 'MySQL',
                'logo' => 'https://raw.githubusercontent.com/devicons/devicon/master/icons/mysql/mysql-original.svg',
                'deskripsi' => 'Sistem manajemen database relasional open-source.',
            ],
            [
                'nama' => 'PostgreSQL',
                'logo' => 'https://raw.githubusercontent.com/devicons/devicon/master/icons/postgresql/postgresql-original.svg',
                'deskripsi' => 'Sistem database relasional objek open-source yang canggih.',
            ],
            [
                'nama' => 'Redis',
                'logo' => 'https://raw.githubusercontent.com/devicons/devicon/master/icons/redis/redis-original.svg',
                'deskripsi' => 'Penyimpanan struktur data dalam memori, digunakan sebagai database, cache, dan message broker.',
            ],
            [
                'nama' => 'Tailwind CSS',
                'logo' => 'https://raw.githubusercontent.com/devicons/devicon/master/icons/tailwindcss/tailwindcss-original-wordmark.svg',
                'deskripsi' => 'Framework CSS utility-first untuk membangun desain kustom dengan cepat.',
            ],
            [
                'nama' => 'Git',
                'logo' => 'https://raw.githubusercontent.com/devicons/devicon/master/icons/git/git-original.svg',
                'deskripsi' => 'Sistem kontrol versi terdistribusi untuk melacak perubahan pada kode.',
            ],
            [
                'nama' => 'Flutter',
                'logo' => 'https://raw.githubusercontent.com/devicons/devicon/master/icons/flutter/flutter-original.svg',
                'deskripsi' => 'UI SDK dari Google untuk membangun aplikasi multi-platform yang dikompilasi secara native.',
            ],
            [
                'nama' => 'Kotlin',
                'logo' => 'https://raw.githubusercontent.com/devicons/devicon/master/icons/kotlin/kotlin-original.svg',
                'deskripsi' => 'Bahasa pemrograman modern yang berjalan di atas JVM dan digunakan untuk Android.',
            ],
            [
                'nama' => 'Swift',
                'logo' => 'https://raw.githubusercontent.com/devicons/devicon/master/icons/swift/swift-original.svg',
                'deskripsi' => 'Bahasa pemrograman kuat dan intuitif dari Apple untuk pengembangan iOS dan macOS.',
            ],
            [
                'nama' => 'Go',
                'logo' => 'https://raw.githubusercontent.com/devicons/devicon/master/icons/go/go-original.svg',
                'deskripsi' => 'Bahasa pemrograman open-source yang memudahkan pembangunan software yang efisien.',
            ],
            [
                'nama' => 'Next.js',
                'logo' => 'https://raw.githubusercontent.com/devicons/devicon/master/icons/nextjs/nextjs-original.svg',
                'deskripsi' => 'Framework React untuk produksi dengan fitur SSR dan static site generation.',
            ],
            [
                'nama' => 'Figma',
                'logo' => 'https://raw.githubusercontent.com/devicons/devicon/master/icons/figma/figma-original.svg',
                'deskripsi' => 'Tool desain antarmuka kolaboratif berbasis web.',
            ],
        ];

        foreach ($tools as $tool) {
            Tools::updateOrCreate(['nama' => $tool['nama']], [
                'logo' => $tool['logo'],
                'deskripsi' => $tool['deskripsi'],
                'active' => true,
            ]);
        }
    }
}
