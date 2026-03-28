<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProsesController extends Controller
{
    /**
     * Tampilkan halaman Proses
     */
    public function index()
    {
        return view('pages.proses');
    }
}
