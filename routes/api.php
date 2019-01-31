<?php

use Crudch\Routing\Router;

/**
 * @var Router $route
 */

$route->group('/articles', function (Router $router) {
    $router->get('/', 'ArticleController@index');
    $router->get('/{id:\d+}', 'ArticleController@show');
    $router->get('/{id:\d+}/edit', 'ArticleController@show');

    $router->post('/{id:\d+}/edit', 'ArticleController@update');
});

$route->group('/profile', function (Router $router) {
    $router->get('/', 'ProfileController@index');
    $router->post('/save', 'ProfileController@save');
});

$route->group('/upload', function (Router $router) {
    $router->post('/avatar', 'ProfileController@upload');
});

$route->post('/registration', 'AuthController@registration');
$route->post('/login', 'AuthController@login');
