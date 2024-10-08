<?php

namespace App\Http;

use App\Http\Middleware\AuthTokenMiddleware;
use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
        // Middleware global
    ];

    protected $middlewareGroups = [
        // Grupos de middleware
    ];

    protected $routeMiddleware = [
        'auth.token' => AuthTokenMiddleware::class,
    ];
}
