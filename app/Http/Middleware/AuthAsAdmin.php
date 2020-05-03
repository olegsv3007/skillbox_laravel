<?php

namespace App\Http\Middleware;

use Closure;

class AuthAsAdmin
{
    public function handle($request, Closure $next)
    {
        if (auth()->guest() || !auth()->user()->isAdmin()) {
            return abort(403);
        }
        return $next($request);
    }
}
