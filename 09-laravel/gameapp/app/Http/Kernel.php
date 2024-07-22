<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
        // Middleware global que se ejecuta en todas las solicitudes
    ];

    protected $middlewareGroups = [
        'web' => [
            // Middleware para el grupo web
        ],

        'api' => [
            // Middleware para el grupo API
        ],
    ];
    

    protected $routeMiddleware = [
        // Middleware asignable a rutas específicas
    ];
}