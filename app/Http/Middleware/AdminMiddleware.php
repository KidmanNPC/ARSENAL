<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth; // Jangan lupa import ini

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Cek: Apakah User sudah login DAN usertype-nya 'admin'?
        if (Auth::check() && Auth::user()->usertype === 'admin') {
            return $next($request); // Silakan masuk
        }

        // Kalau bukan admin, lempar balik ke halaman utama
        return redirect('/')->with('error', 'Anda tidak punya akses ke halaman Admin!');
    }
}