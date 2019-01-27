<?php
/**
 * @var \Crudch\Routing\Router $route
 */

$route->get('/', 'IndexController@index');

foreach (['/articles', '/articles/{id:\d+}', 'articles/{id:\d+}/edit', 'articles/create'] as $url) {
    $route->get($url, 'ArticleController@all');
}