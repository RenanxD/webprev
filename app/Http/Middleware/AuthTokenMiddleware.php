<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class AuthTokenMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!Session::has('auth_token')) {
            $slug = $request->route('slug');

            return redirect()->route('login.signin', ['slug' => $slug])
                ->withErrors(['message' => 'Você precisa de um token válido para acessar esta página.']);
        }

        return $next($request);
    }
}
