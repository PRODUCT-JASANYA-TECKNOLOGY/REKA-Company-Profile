<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdukController extends Controller
{
    private $produkData = [
        'reka-cms' => [
            'id' => 'reka-cms',
            'nama' => 'REKA CMS',
            'cat' => 'Productivity',
            'tagline' => 'Kelola konten website Anda dengan mudah',
            'desc' => 'Content Management System yang simpel namun powerful. Cocok untuk tim non-teknis yang butuh kontrol penuh atas website mereka.',
            'harga' => 'Rp499.000/bln',
            'status' => 'Available',
            'icon' => 'layout-dashboard',
            'fitur' => ['Editor visual drag-and-drop', 'Multi-user & role management', 'SEO tools terintegrasi', 'Media library terorganisir', 'Version control konten', 'API headless'],
            'galleries' => ['https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=800&q=70', 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800&q=70', 'https://images.unsplash.com/photo-1504639725590-34d0984388bd?w=800&q=70']
        ],
        'reka-analytics' => [
            'id' => 'reka-analytics',
            'nama' => 'REKA Analytics',
            'cat' => 'Analytics',
            'tagline' => 'Pahami bisnis Anda lewat data',
            'desc' => 'Dashboard analitik bisnis yang menggabungkan data dari berbagai sumber dan menyajikannya dalam visualisasi yang mudah dipahami.',
            'harga' => 'Rp799.000/bln',
            'status' => 'Available',
            'icon' => 'bar-chart-3',
            'fitur' => ['Koneksi 20+ sumber data', 'Dashboard realtime', 'Laporan otomatis via email', 'Alert & notifikasi pintar', 'Ekspor ke Excel/PDF', 'Akses mobile'],
            'galleries' => ['https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=800&q=70', 'https://images.unsplash.com/photo-1590283603385-17ffb3a7f29f?w=800&q=70', 'https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?w=800&q=70']
        ],
        'reka-hr' => [
            'id' => 'reka-hr',
            'nama' => 'REKA HRM',
            'cat' => 'HR & People',
            'tagline' => 'Manajemen SDM yang lebih manusiawi',
            'desc' => 'Sistem HR komprehensif untuk mengelola absensi, payroll, performance review, dan rekrutmen dalam satu platform terintegrasi.',
            'harga' => 'Rp999.000/bln',
            'status' => 'Available',
            'icon' => 'users',
            'fitur' => ['Absensi & cuti digital', 'Payroll otomatis', 'Performance review 360°', 'Modul rekrutmen', 'e-Contract & dokumen', 'Self-service karyawan'],
            'galleries' => ['https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=800&q=70', 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=800&q=70', 'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=800&q=70']
        ],
        'reka-pos' => [
            'id' => 'reka-pos',
            'nama' => 'REKA POS',
            'cat' => 'Retail & Commerce',
            'tagline' => 'Point of Sale modern untuk bisnis Anda',
            'desc' => 'Sistem kasir berbasis cloud yang bisa diakses dari mana saja.',
            'harga' => 'Rp399.000/bln',
            'status' => 'Coming Soon',
            'icon' => 'shopping-cart',
            'fitur' => ['Transaksi offline mode', 'Multi-cabang & multi-kasir', 'Laporan penjualan realtime', 'Manajemen stok otomatis', 'Integrasi payment gateway', 'Loyalty program'],
            'galleries' => ['https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=800&q=70', 'https://images.unsplash.com/photo-1556742111-a301076d9d18?w=800&q=70', 'https://images.unsplash.com/photo-1519389950473-47ba0277781c?w=800&q=70']
        ],
    ];

    public function index()
    {
        return view('pages.produk', [
            'products' => $this->produkData
        ]);
    }

    public function show($id)
    {
        if (!array_key_exists($id, $this->produkData)) {
            abort(404);
        }

        return view('pages.produk-detail', [
            'product' => $this->produkData[$id]
        ]);
    }
}
