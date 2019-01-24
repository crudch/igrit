<?php
/**
 * @var \Crudch\Routing\Router $route
 */

$route->group('/cars', function (\Crudch\Routing\Router $route) {
    $route->get('/', 'CarController@index');
    $route->get('/{id:\d+}', 'CarController@show');
});
