<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product; // 1. PASTIKAN MODEL PRODUCT DIPANGGIL
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // 2. Ambil semua data produk dari database
        $products = Product::all();

        // 3. Kirim variabel $products ke view
        return view('admin.products.index', compact('products'));
    }
}