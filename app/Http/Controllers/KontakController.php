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

    /**
     * Simpan data dari form kontak ke database
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'      => 'required|string|max:128',
            'email'     => 'required|email|max:128',
            'whatsapp'  => 'nullable|string|max:18',
            'kebutuhan' => 'nullable|string',
        ]);

        \App\Models\Kontak::create([
            'nama'      => $validated['nama'],
            'email'     => $validated['email'],
            'no_wa'     => $validated['whatsapp'],
            'deskripsi' => $validated['kebutuhan'],
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Pesan Anda telah terkirim! Tim kami akan segera menghubungi Anda.',
        ]);
    }
}
