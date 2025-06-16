<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    public function handle(Request $request, Closure $next): Response
    {
        // Periksa apakah user login menggunakan guard 'admin'
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Periksa apakah user memiliki role admin (jika ada kolom role di tabel admin)
        $admin = Auth::guard('admin')->user();
        if ($admin->role !== 'admin') {
            Auth::guard('admin')->logout();
            return redirect()->route('admin.login')->with('error', 'Akses ditolak.');
        }

        return $next($request);
    }
}
