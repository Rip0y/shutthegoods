<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ProductController; // 1. TAMBAHKAN INI
use App\Models\Product;

Route::get('/', function () {
    $products = Product::latest()->get(); // Mengambil semua produk, diurutkan dari yang terbaru
    return view('welcome', ['products' => $products]);
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

    Route::get('/tentang-kami', function () {
    return view('tentang-kami');
});

Route::get('/syarat-ketentuan', function () {
    return view('syarat-ketentuan');
});

Route::get('/karir', function () {
    return view('karir');
});

Route::get('/blog', function () {
    return view('blog');
});
// ===================================
// GRUP RUTE ADMIN
// ===================================
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // 2. TAMBAHKAN RUTE PRODUK DI SINI
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');

});
// ===================================

// Catatan: Anda memiliki dua definisi untuk rute '/', yang atas akan digunakan.
// Route::get('/', [HomeController::class, 'index'])->name('home');

require __DIR__.'/auth.php';
