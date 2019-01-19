<?php
/**
 * @var \Crudch\Routing\Router $route
 */

foreach (['/', '/{id:\d+}', '/create', '/{id:\d+}/edit'] as $url) {
    $route->get($url, 'MaxController@index');
}

foreach (['/min', '/min/cars'] as $url) {
    $route->get($url, 'MinController@index');
}


$route->get('/products', 'ProductController@index');
$route->get('/products/{id:\d+}', 'ProductController@show');
$route->get('/products/{id:\d+}/edit', 'ProductController@show');

$route->post('/products', 'ProductController@store');
$route->post('/products/{id:\d+}/delete', 'ProductController@destroy');
$route->post('/products/{id:\d+}/edit', 'ProductController@update');
