<?php
/**
 * @var \Crudch\Routing\Router $route
 */

$route->get('/', 'IndexController@index');

$routes = [
    '/chat',
    '/login',
    '/profile',
    '/articles',
    '/registration',
    '/articles/create',
    '/articles/{id:\d+}',
    '/articles/{id:\d+}/edit',
];

foreach ($routes as $url) {
    $route->get($url, 'ArticleController@all');
}