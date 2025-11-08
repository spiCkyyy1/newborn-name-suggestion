<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
        $queryKey = $request->query('key');
        $headerKey = $request->header('x-admin-key');
        $hash = env('ADMIN_KEY_HASH');

        $isQueryValid = $queryKey && Hash::check($queryKey, $hash);
        $isHeaderValid = $headerKey && Hash::check($headerKey, $hash);

        if (! $isQueryValid && ! $isHeaderValid) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
