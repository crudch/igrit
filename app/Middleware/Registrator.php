<?php

namespace App\Middleware;

/**
 * Class Registrator
 *
 * @package App\Middleware
 */
class Registrator
{
    /**
     * @var array
     */
    public static $general_middleware = [
        //ProfilerMiddleware::class,
    ];

    /**
     * @var array
     */
    public static $middleware = [
        'auth'     => AuthMiddleware::class,
        'guest'    => GuestMiddleware::class,
        'admin'    => AdminMiddleware::class,
        'profiler' => ProfilerMiddleware::class,
    ];
}
