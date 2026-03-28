<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Placeholders for other pages to prevent route missing errors
Route::get('/layanan', function () { return "Layanan Page Placeholder"; })->name('layanan');
Route::get('/proses', function () { return "Proses Page Placeholder"; })->name('proses');
Route::get('/portofolio', function () { return "Portofolio Page Placeholder"; })->name('portofolio');
Route::get('/kontak', function () { return "Kontak Page Placeholder"; })->name('kontak');

Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', function () { return "Blog Index Placeholder"; })->name('index');
    Route::get('/{slug}', function () { return "Blog Detail Placeholder"; })->name('show');
});

Route::prefix('produk')->name('produk.')->group(function () {
    Route::get('/', function () { return "Produk Index Placeholder"; })->name('index');
    Route::get('/{slug}', function () { return "Produk Detail Placeholder"; })->name('show');
});
