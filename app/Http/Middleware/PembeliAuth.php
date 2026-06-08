<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PembeliAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('user') || session('user.role') !== 'pembeli') {
            return redirect('/login/pembeli');
        }

        return $next($request);
    }
}
