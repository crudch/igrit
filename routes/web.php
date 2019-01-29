<?php
/**
 * @var \Crudch\Routing\Router $route
 */

$route->get('/', 'IndexController@index');

$routes = [
    '/login',
    '/registration',
    '/profile',
    '/articles',
    '/articles/{id:\d+}',
    'articles/{id:\d+}/edit',
    'articles/create',
];

foreach ($routes as $url) {
    $route->get($url, 'ArticleController@all');
}