<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        if (!in_array($user->role, $roles)) {
            return redirect('/home'); // Redirect jika tidak sesuai role
        }

        return $next($request);
    }
}

