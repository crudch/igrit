<?php
/**
 * @var \Crudch\Routing\Router $route
 */

$route->get('/', 'IndexController@index');

$routes = [
    '/login',
    '/profile',
    '/products',
    '/articles',
    '/simple-chat',
    '/registration',
    '/articles/create',
    '/articles/{id:\d+}',
    '/articles/{id:\d+}/edit',
];

foreach ($routes as $url) {
    $route->get($url, 'ArticleController@all');
}