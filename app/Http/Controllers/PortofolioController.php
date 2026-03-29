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
        return view('pages.portofolio');
    }
}
