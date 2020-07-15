<?php

return [
    /**
     * Окружение:  local | production
     */
    'env'          => 'local',

    /**
     * Имя приложения
     */
    'domain'       => 'igrit',

    /**
     * Полный путь
     */
    'url'          => 'http://igrit',

    /**
     * Использовать HTTPS в куках
     */
    'secure'       => false,

    /**
     * Подключение к бд
     */
    'db'           => [
        'driver' => 'sqlite',

        'mysql'  => [
            'host'     => '127.0.0.1',
            'database' => 'igrit',
            'username' => 'root',
            'password' => '',
            'charset'  => 'utf8mb4',
            'options'  => [
                \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
                //\PDO::ATTR_EMULATE_PREPARES  => false,
                //\PDO::ATTR_STRINGIFY_FETCHES => false
            ],
        ],

        'sqlite' => [
            'database' => __DIR__ . '/database.sqlite',
        ],
    ],

    /**
     * Кеш
     */
    'cache_driver' => \Crudch\Cache\Drivers\FileDriver::class,

    /**
     * Основной email
     */
    'mail'         => 'info@igrit.ru',
];
