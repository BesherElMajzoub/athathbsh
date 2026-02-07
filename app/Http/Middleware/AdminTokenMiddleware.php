<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminTokenMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $token = config('site.admin_token');

        if (empty($token)) {
            abort(403, 'Admin access is not configured.');
        }

        // Check session first
        if ($request->session()->get('admin_authenticated') === true) {
            return $next($request);
        }

        // Check token from query or header
        $providedToken = $request->input('token') ?? $request->header('X-Admin-Token');

        if ($providedToken === $token) {
            $request->session()->put('admin_authenticated', true);
            return $next($request);
        }

        abort(403, 'Unauthorized access.');
    }
}
