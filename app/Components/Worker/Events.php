<?php

namespace App\Components\Worker;

use Exception;
use GatewayWorker\Lib\Gateway;

class Events
{
    /**
     * @param string $client_id
     */
    public static function onConnect(string $client_id)
    {
        Gateway::sendToCurrentClient(json_encode([
            'type' => 'init',
            'data' => ['client_id' => $client_id],
        ]));
    }

    /**
     * @param $client_id
     * @param $message
     *
     * @throws Exception
     */
    public static function onMessage($client_id, $message)
    {
        /*$data = json_decode($message, true);

        if ($data['type'] === 'write') {
            Gateway::sendToAll(json_encode([
                'type' => 'write',
            ]));
        }*/
        Gateway::sendToAll('fuck');
    }

    /**
     * @param $client_id
     *
     * @throws Exception
     */
    public static function onClose($client_id)
    {
        //$user_id = $_SESSION['uid'];

        //print_r($user_id);
        // 向所有人发送
        GateWay::sendToAll("$client_id has go on");
    }

    /**
     * @param string $client_id
     * @param array  $data
     */
    public static function onWebSocketConnect(string $client_id, array $data)
    {
        //Gateway::sendToCurrentClient(json_encode([$client_id, $data, $_SESSION]));

        /*if (!isset($data['get']['token'])) {
            Gateway::closeClient($client_id);
        }*/
    }
}
