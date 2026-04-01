<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\ProsesController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\ProdukController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/layanan', [LayananController::class, 'index'])->name('layanan');
Route::get('/proses', [ProsesController::class, 'index'])->name('proses');
Route::get('/portofolio', [PortofolioController::class, 'index'])->name('portofolio');
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');
Route::post('/kontak', [KontakController::class, 'store'])->name('kontak.store');

Route::prefix('produk')->name('produk.')->group(function () {
    Route::get('/', [ProdukController::class, 'index'])->name('index');
    Route::get('/{id}', [ProdukController::class, 'show'])->name('show');
});

Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', [App\Http\Controllers\BlogController::class, 'index'])->name('index');
    Route::get('/{slug}', [App\Http\Controllers\BlogController::class, 'show'])->name('show');
});


