<?php

namespace App\Http\Middleware;

use App\Helper\AuthCheck;
use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuthRole
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
        if(AuthCheck::AuthAdminCheck())
        {
            return $next($request);
        }
        else{
            Auth::logout();
            return redirect()->action('UtilityController@login');
        }
    }
}
