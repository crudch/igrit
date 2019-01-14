<?php
/**
 * @var \Crudch\Routing\Router $route
 */

foreach (['/', '/{id:\d+}', '/create', '/{id:\d+}/edit'] as $url) {
    $route->get($url, 'IndexController@index');
}

