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


$route->group('/products', function (Router $router) {
    $router->get('/', 'ProductController@index');
});

$route->group('/profile', function (Router $router) {
    $router->get('/', 'ProfileController@index');
    $router->post('/save', 'ProfileController@save');
});

$route->group('/upload', function (Router $router) {
    $router->post('/avatar', 'ProfileController@upload');
});

$route->group('/chat', function (Router $router) {
    $router->get('/all/{id:\d+}', 'ChatController@index');
    $router->get('/add/{id:\d+}', 'ChatController@add');
    $router->post('/init/{client_id}', 'ChatController@init');
    $router->post('/store', 'ChatController@store');
});

$route->post('/registration', 'AuthController@registration');
$route->post('/login', 'AuthController@login');
