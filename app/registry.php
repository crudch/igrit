<?php
/**
 * Регистрация кастомных классов
 */
return [
    \App\Component\Auth::class => function () {
        return (new \App\Component\Auth())->getAuthUser();
    },
];