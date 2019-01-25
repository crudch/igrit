<?php
/**
 * @var \Crudch\Routing\Router $route
 */

$route->get('/', 'IndexController@index');

foreach (['/articles', '/articles/{id:\d+}', 'articles/{id:\d+}/edit'] as $url) {
    $route->get($url, 'ArticleController@all');
}