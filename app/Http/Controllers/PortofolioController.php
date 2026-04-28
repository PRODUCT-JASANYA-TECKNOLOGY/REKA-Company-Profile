<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortofolioController extends Controller
{
    /**
     * Tampilkan halaman Portofolio
     */
    public function index()
    {
        $portofolios = \App\Models\Portofolio::query()
            ->with(['klient', 'category', 'tools'])
            ->where('active', true)
            ->orderByDesc('tanggal_proyek')
            ->get();

        return view('pages.portofolio', compact('portofolios'));
    }
}
