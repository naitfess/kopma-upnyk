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
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        // Pastikan pengguna telah login
        if (!Auth::check()) {
            return redirect('/login');
        }

        // Cek apakah peran pengguna sesuai
        if (Auth::user()->role !== $role) {
            return abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}