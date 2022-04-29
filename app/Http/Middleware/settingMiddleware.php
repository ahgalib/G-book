<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Hash;
use Auth;
class settingMiddleware
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
        if(!Auth::user('setting')->check()){
            return redirect('/settingLoginPage');
        }
        return $next($request);
    }
}
