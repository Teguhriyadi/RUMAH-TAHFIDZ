<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Otentikasi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $guard = NULL)
    {
        if (Auth::guard($guard)->check()) {
            return redirect('app/admin/home');
        }
        return $next($request);

        // return response()->json(['message' => 'Anda belum login!']);
        // if (!Session::get('akun')) {
        //     return response()->json(['message' => 'Anda belum login!']);
        // }

        // return response()->json(['message' => 'Anda sudah login!']);

    }
}
