<?php

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

// Rute untuk menampilkan halaman registrasi
Volt::route('register', 'pages.auth.register')
    ->middleware('guest')
    ->name('register');

// Rute untuk menampilkan halaman login
Volt::route('login', 'pages.auth.login')
    ->middleware('guest')
    ->name('login');

// Rute untuk lupa kata sandi
Volt::route('forgot-password', 'pages.auth.forgot-password')
    ->middleware('guest')
    ->name('password.request');

// Rute untuk reset kata sandi
Volt::route('reset-password/{token}', 'pages.auth.reset-password')
    ->middleware('guest')
    ->name('password.reset');

// Rute yang memerlukan pengguna untuk login
Route::middleware('auth')->group(function () {
    Volt::route('verify-email', 'pages.auth.verify-email')
        ->name('verification.notice');

    Volt::route('confirm-password', 'pages.auth.confirm-password')
        ->name('password.confirm');

    // Rute untuk logout
    Route::get('logout', Logout::class)->name('logout');
});
