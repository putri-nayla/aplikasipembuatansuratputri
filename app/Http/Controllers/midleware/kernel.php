<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middlewareAliases = [
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,

    ];

    protected $routeMiddleware = [
        'auth.admin' => \App\Http\Middleware\AdminAuth::class,

    ];
}

