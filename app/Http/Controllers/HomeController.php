<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Tampilkan halaman Beranda (Home)
     */
    public function index()
    {
        // TODO: Wiring data jika diperlukan
        
        return view('pages.home');
    }
}
