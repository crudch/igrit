<?php

namespace App\Middleware;

use Crudch\Middleware\SessionMiddleware;
use Crudch\Middleware\Handlers\ApiHandlerMiddleware;
use Crudch\Middleware\Handlers\WebHandlerMiddleware;

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
    public static $registry = [
        'global' => [
            //ProfilerMiddleware::class,
            //SessionMiddleware::class,
        ],
        'web' => [
            SessionMiddleware::class,
            WebHandlerMiddleware::class,
        ],
        'api' => [
            ApiHandlerMiddleware::class,
            NoCacheMiddleware::class,
        ],
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
