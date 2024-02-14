<?php

namespace App\Http\Middleware;

use App\Policies\UserPolicy;
use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if ($user && app(UserPolicy::class)->viewIsAdmin($user)) {
            return $next($request);
        }

        abort(401, 'Unauthorized action.');
    }
}
