<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Yonetim
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::guard('yonetici')->check() && Auth::guard('yonetici')->user()->yonetici_mi)
        {

            return $next($request);
        }

        return redirect()->route('oturumac');
    }
}
