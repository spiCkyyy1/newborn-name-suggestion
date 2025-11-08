<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            // Synchronously...
            'appName' => config('app.name'),
            'flash' => [
                'success' => fn () => $request->session()->get('success', null),
                'error'   => fn () => $request->session()->get('error', null),
            ],
            'errors' => fn () => $request->session()->get('errors')
                ? $request->session()->get('errors')->getBag('default')->getMessages()
                : (object) [],
        ]);
    }
}
