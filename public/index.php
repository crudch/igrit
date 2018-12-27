<?php

use Crudch\Http\Request;
use Crudch\Http\Exceptions\MultiException;
use Crudch\Container\Container;

require dirname(__DIR__) . '/vendor/autoload.php';


Container::set(\Crudch\Config\Config::class, function () {
    return new Crudch\Config\Config(dirname(__DIR__) . '/config.php');
});

Container::set(Request::class, function () {
    return new Request();
});

try{
   var_dump(
       config('db')
   );
}catch (\Throwable $e) {
    var_dump($e);die;
}

try {
    /** @var \App\Requests\TestRequest $request */
    $request = Container::get(\App\Requests\TestRequest::class);
    $request->setAttributes(['a' => '1', 'b' => 3]);

    var_dump(
        Container::get(Request::class)->all()
    );
} catch (\Throwable $e) {
    if ($e instanceof MultiException) {
       var_dump($e->toArray());
       die;
    }

    var_dump($e);
}