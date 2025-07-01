<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'SHUTTHEGOODS.CO')</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- CATATAN: Mungkin akan ada konflik gaya antara Bootstrap dan Tailwind CSS bawaan. --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('style.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans&family=Inter&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-white dark:bg-gray-900">

        {{-- HEADER SHUTTHEGOODS DIMASUKKAN DI SINI, MENGGANTIKAN NAVIGASI BAWAAN --}}
        <header class="p-3 mb-2 mt-2 sticky-top bg-white shadow-sm">
            <div class="container-fluid">
                <div class="d-flex flex-wrap align-items-center justify-content-between">
                    <a href="/" class="d-flex align-items-center text-dark text-decoration-none me-3">
                        <h2 class="logo-title m-0">Shutthegoods</h2>
                    </a>

                    <ul class="nav justify-content-center flex-grow-1">
                        {{-- ... (Isi lengkap navigasi Anda) ... --}}
                    </ul>

                    <div class="d-flex align-items-center ms-3">
                        {{-- ... (Isi lengkap form pencarian dan ikon akun Anda) ... --}}
                    </div>
                </div>
            </div>
        </header>

        @if (isset($header))
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <main>
            {{ $slot }}
        </main>

        {{-- FOOTER SHUTTHEGOODS DIMASUKKAN DI SINI --}}
        <footer id="akun" class="bg-dark text-light section-padding pb-5">
            <div class="container-lg">
                <div class="row">
                    {{-- ... (Isi lengkap semua kolom footer Anda) ... --}}
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-menu">
                            <img src="{{ asset('images/logo.svg') }}" width="300" height="190" alt="logo" />
                            <div class="social-links mt-3">
                                {{-- ... (Isi link sosial media Anda) ... --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6">
                         {{-- ... (Menu Shutthegoods) ... --}}
                    </div>
                    <div class="col-md-2 col-sm-6">
                        {{-- ... (Menu Untuk Penjual) ... --}}
                    </div>
                    <div class="col-md-2 col-sm-6">
                       {{-- ... (Menu Layanan Pelanggan) ... --}}
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        {{-- ... (Form Berlangganan) ... --}}
                    </div>
                </div>
            </div>
        </footer>
        <div id="footer-bottom" class="bg-dark text-
