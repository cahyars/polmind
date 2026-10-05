<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureAdmin
{
    /**
     * Handle an incoming request.
     * Ensure only full administrators can access the route.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->user() || ! $request->user()->isAdmin()) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Akses ditolak. Fitur ini hanya untuk Administrator.'], 403);
            }

            return redirect()->route('admin.berita.index')
                ->with('error', 'Akses dibatasi: Akun Anda memiliki peran Humas / Operator yang hanya berhak mengelola Berita.');
        }

        return $next($request);
    }
}
