<?php

namespace App\Http\Controllers;

use App\Models\Faq;

class HomeController extends Controller
{
    /**
     * Tampilkan halaman Beranda (Home)
     */
    public function index()
    {
        $faqs = Faq::query()
            ->where('active', true)
            ->orderBy('id')
            ->get();

        return view('pages.home', compact('faqs'));
    }
}
