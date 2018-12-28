<?php

require dirname(__DIR__) . '/vendor/autoload.php';

session_start();

(new \Crudch\Bootstrap\Bootstrap(dirname(__DIR__)))
    ->start();
