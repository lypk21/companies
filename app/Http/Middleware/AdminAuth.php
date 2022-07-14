<?php

namespace App\Http\Middleware;

use App\Http\Utiles\Constants;
use Closure;
use Illuminate\Http\Request;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!$request->user() || !in_array($request->user()->role,[Constants::USER_ROLE_ADMINISTRATOR, Constants::USER_ROLE_OWNER] )){
            return redirect('index');
        }
        return $next($request);
    }
}
