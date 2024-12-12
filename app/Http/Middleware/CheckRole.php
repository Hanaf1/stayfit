<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next, int $expectedRole)
    {
        if (!auth()->check() || auth()->user()->role !== $expectedRole) {
            abort(403, 'Unauthorized access.');
        }

        return $next($request);
    }
}
