<?php

namespace App\Http\Middleware;
use Closure;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if ($request->user() && $request->user()->username === 'admin') {
            return $next($request);
        }

        abort(401, 'Unauthorized action.');
    }
}
