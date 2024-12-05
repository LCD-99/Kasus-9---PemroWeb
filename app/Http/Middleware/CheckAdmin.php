<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah pengguna adalah admin
        if (Auth::user() && Auth::user()->role == 'admin') {
            return $next($request);
        }

        // Jika bukan admin, redirect ke halaman lain (misalnya halaman home)
        return redirect()->route('home');
    }
}

