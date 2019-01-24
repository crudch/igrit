<?php

require dirname(__DIR__) . '/vendor/autoload.php';

session_start();

(new \Crudch\Bootstrap\StandardBoot(dirname(__DIR__)))
    ->start();
