<?php

use \Workerman\Worker;
use App\Components\Worker\Events;
use \GatewayWorker\BusinessWorker;

require_once __DIR__ . '/../../vendor/autoload.php';

$worker = new BusinessWorker();
$worker->name = 'BusinessWorker';
$worker->count = 4;
$worker->registerAddress = '127.0.0.1:1236';
$worker->eventHandler = Events::class;

if (!defined('GLOBAL_START')) {
    Worker::runAll();
}
