<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('user') || session('user.role') !== 'admin') {
            return redirect('/login/admin');
        }

        return $next($request);
    }
}
