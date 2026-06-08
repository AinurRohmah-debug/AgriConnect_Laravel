<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PetaniAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('user') || session('user.role') !== 'petani') {
            return redirect('/login/petani');
        }
        if (session('user.role') !== 'petani') {
            abort(403);
        }

        return $next($request);
    }
}
