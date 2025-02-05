<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckSiswa
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('siswa')->check()) {
            return redirect('/auth')->with('error', 'Anda tidak memiliki akses.');
        }

        return $next($request);
    }
}
