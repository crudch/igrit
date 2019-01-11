<?php
/**
 * @var \Crudch\Routing\Router $route
 */

$route->get('/', 'IndexController@index');

$route->get('/comp-1', 'IndexController@comp1');