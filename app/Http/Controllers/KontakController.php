<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KontakController extends Controller
{
    /**
     * Tampilkan halaman Kontak
     */
    public function index()
    {
        return view('pages.kontak');
    }
}
