<?php
/**
 * Регистрация кастомных классов
 */
return [
    'global' => [
        //
    ],
    'web' => [
        \App\Component\Auth::class => function () {
            return (new \App\Component\Auth())->getAuthUser();
        },
    ],
    'api' => [
        //
    ]
];