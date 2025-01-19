<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        // Periksa apakah pengguna memiliki role yang diizinkan
        if (!$user || !in_array($user->role, $roles)) {
            $message = $user
                ? "Role Anda ({$user->role}) tidak memiliki izin untuk mengakses halaman ini."
                : "Anda belum login.";
            abort(403, $message);
        }

        return $next($request);
    }
}
