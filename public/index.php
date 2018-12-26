<?php

require dirname(__DIR__) . '/vendor/autoload.php';


\Crudch\Container::set('config', function () {
    return require dirname(__DIR__) . '/config.php';
});

\Crudch\Container::set(\Crudch\Request::class, function () {
    return new \Crudch\Request();
});


try {
    var_dump(\Crudch\Container::get(\Crudch\Container::class));
} catch (\Throwable $e) {
    var_dump($e->getPrevious());
}
