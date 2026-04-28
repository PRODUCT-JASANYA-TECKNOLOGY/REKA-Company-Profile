<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LayananController extends Controller
{
    /**
     * Tampilkan halaman Layanan
     */
    public function index()
    {
        $layanans = \App\Models\Layanan::query()
            ->where('active', true)
            ->orderBy('id')
            ->get();

        return view('pages.layanan', compact('layanans'));
    }
}
