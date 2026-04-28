<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Klient;

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

        $layanans = \App\Models\Layanan::query()
            ->where('active', true)
            ->orderBy('id')
            ->take(6)
            ->get();

        $klients = Klient::query()
            ->with(['category'])
            ->where('active', true)
            ->whereNotNull('logo')
            ->where('logo', '!=', '')
            ->orderBy('id')
            ->take(8)
            ->get();

        $industries = \App\Models\Category::query()
            ->where('active', true)
            ->where('type', 'Industry')
            ->orderBy('nama')
            ->get();

        $technologies = \App\Models\Category::query()
            ->where('active', true)
            ->where('type', 'Technology')
            ->orderBy('nama')
            ->get();

        $marqueeKlients = $klients->map(function ($klient) {
            $logoPath = (string) ($klient->logo ?? '');
            $hasLogo = filled($logoPath);
            $logoUrl = str_starts_with($logoPath, 'http://') || str_starts_with($logoPath, 'https://')
                ? $logoPath
                : asset('storage/' . ltrim($logoPath, '/'));
            $initial = collect(explode(' ', trim((string) $klient->nama)))
                ->filter()
                ->take(2)
                ->map(fn ($word) => strtoupper(substr($word, 0, 1)))
                ->implode('');

            return (object) [
                'nama' => $klient->nama,
                'logo_url' => $logoUrl,
                'has_logo' => $hasLogo,
                'initial' => $initial,
            ];
        });

        if ($marqueeKlients->isNotEmpty()) {
            $marqueeKlients = $marqueeKlients->concat($marqueeKlients);
        }

        return view('pages.home', compact('faqs', 'layanans', 'klients', 'marqueeKlients', 'industries', 'technologies'));
    }
}
