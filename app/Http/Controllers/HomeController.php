<?php

namespace App\Http\Controllers;

use App\Models\Product; // <-- Import model Product
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman utama dengan daftar produk.
     */
    public function index()
    {
        // Ambil 8 produk terbaru dari database
        $products = Product::latest()->take(8)->get();

        // Kirim data produk ke view 'welcome'
        return view('welcome', [
            'products' => $products
        ]);
    }
}