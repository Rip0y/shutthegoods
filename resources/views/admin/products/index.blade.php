{{-- Menggunakan layout utama dari paket AdminLTE --}}
@extends('adminlte::page')

{{-- Judul Halaman (muncul di tab browser) --}}
@section('title', 'Manajemen Produk')

{{-- Judul Konten (muncul di bagian atas halaman) --}}
@section('content_header')
    <h1>Manajemen Produk</h1>
@endsection

{{-- Konten Utama Halaman --}}
@section('content')
    <p>Selamat datang di panel manajemen produk. Di sini Anda bisa menambah, melihat, dan menghapus produk.</p>

    {{-- KITA AKAN MELETAKKAN KOMPONEN LIVEWIRE DI SINI --}}
    @livewire('admin.products')

@endsection

{{-- (Opsional) Tambahan CSS khusus untuk halaman ini --}}
@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@endsection

{{-- (Opsional) Tambahan JavaScript khusus untuk halaman ini --}}
@section('js')
    <script> console.log('Halaman Manajemen Produk dimuat!'); </script>
@endsection