<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // CEK JIKA SUDAH LOGIN
        if (Auth::user()) {

            // CEK JIKA ROLE ADMIN, MAKA BOLEH MENGAKSES
            if (Auth::user()->role == 'ADMIN') {
                return $next($request);
            }
            return redirect('/');
        } else {
            // SELAIN YANG TIDAK LOGIN DI KEMBALIKAN KE HALAMAN LOGIN
            return redirect('/login')->with('message','Silahkan login terlebih dahulu');
        }
    }
}
