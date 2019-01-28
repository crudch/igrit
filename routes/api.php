<?php

use Crudch\Routing\Router;

/**
 * @var Router $route
 */

$route->group('/articles', function (Router $router) {
    $router->get('/', 'ArticleController@index');
    $router->get('/{id:\d+}', 'ArticleController@show')
        ->middleware('admin');
    $router->get('/{id:\d+}/edit', 'ArticleController@show');

    $router->post('/{id:\d+}/edit', 'ArticleController@update');
});

