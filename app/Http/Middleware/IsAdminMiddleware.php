<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth; // <-- 1. TAMBAHKAN BARIS INI

class IsAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 2. UBAH DARI auth()-> menjadi Auth::
        if (Auth::check() && Auth::user()->is_admin) {
            return $next($request);
        }

        // Jika bukan admin, tolak akses. Kode Anda di sini sudah bagus.
        abort(403, 'Unauthorized Access');
    }
}