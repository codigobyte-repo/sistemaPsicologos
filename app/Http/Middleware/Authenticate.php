<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        /* Cambiamos esto */
        return $request->expectsJson() ? null : route('login');

        /* Por esto para que cuando expire la sesión muestre una vista con un mensaje */
        /* if (! $request->expectsJson()) {
            return response()->view('session-expired');
        } */
    }
}
