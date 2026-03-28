<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\ProsesController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/layanan', [LayananController::class, 'index'])->name('layanan');
Route::get('/proses', [ProsesController::class, 'index'])->name('proses');
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
