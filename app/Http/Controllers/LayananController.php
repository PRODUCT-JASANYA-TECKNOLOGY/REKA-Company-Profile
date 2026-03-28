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
        // TODO: Data layanan dinamis bisa dikirim dari sini
        return view('pages.layanan');
    }
}
