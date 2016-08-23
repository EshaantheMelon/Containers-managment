<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAgent
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
        if ( Auth::check() && (Auth::user()->isAdministrator() || Auth::user()->isAdmin() || Auth::user()->isAgent()))
        {
            return $next($request);
        }

        return redirect('/login');
    }
}
