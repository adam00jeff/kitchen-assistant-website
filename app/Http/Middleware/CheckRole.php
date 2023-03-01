<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if(!$request->user()->is_admin && $role=="admin"){
            return redirect('/login');
        }

        return $next($request);
    }
}
