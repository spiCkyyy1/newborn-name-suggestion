<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $queryKey  = $request->query('key');
        $headerKey = $request->header('x-admin-key');
        if ($queryKey !== env('ADMIN_KEY') && $headerKey !== env('ADMIN_KEY')) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
