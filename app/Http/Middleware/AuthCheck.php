<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
{
    public function handle(Request $request, Closure $next)
    {
        // Periksa apakah user sudah login (session 'user' ada)
        if (!$request->session()->has('user')) {
            return redirect('login')->with('error', 
                'Anda harus login terlebih dahulu');
        }

        return $next($request);
    }
}
