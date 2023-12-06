<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Memastikan bahwa user terautentikasi
        if ($request->user()) {
            // Mengambil relasi role dari user
            $userRole = $request->user()->role;

            // Memeriksa apakah peran user cocok dengan peran yang diharapkan
            if ($userRole && $userRole->name == $role) {
                return $next($request);
            }
        }

        return abort(403, 'Unauthorized');
    }
}
