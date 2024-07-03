<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
     /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */

     protected $middleware = [
        \App\Http\Middleware\IsAdmin::class,
        \App\Http\Middleware\IsStudent::class,
        \App\Http\Middleware\IsEmployer::class,
     ];

     /**
     * The application's route middleware groups.
     *
     * @var array
     */

     protected $middlewareGroups =
    [
        'web' => [
            \App\Http\Middleware\IsAdmin::class,
            \App\Http\Middleware\IsEmployer::class,
            \App\Http\Middleware\IsStudent::class,

        ],

        'api' => [

        ]
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */

     protected $routeMiddleware = [

        //'auth' => \App\Http\Middleware\Authenticate::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        'IsAdmin' => \App\Http\Middleware\IsAdmin::class,
        'IsStudent' => \App\Http\Middleware\IsAdmin::class,
        'IsEmployer' => \App\Http\Middleware\IsAdmin::class,
     ];
}
