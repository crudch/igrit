<?php

namespace App\Controllers;

use App\Models\Chat;
use GatewayClient\Gateway;
use App\Requests\ChatRequest;
use Crudch\Foundation\Controller;

class ChatController extends Controller
{
    public function index($id)
    {
        $chat = Chat::allById($id);

        return json($chat);
    }

    public function init($client_id)
    {
        $data = [
            'id'         => auth()->id,
            'first_name' => auth()->first_name,
            'room_id'    => 'chat',
            'client_id'  => $client_id,
        ];

        Gateway::bindUid($client_id, auth()->id);
        Gateway::setSession($client_id, $data);

        if (!array_key_exists(auth()->id, Gateway::getUidListByGroup('chat'))) {
            Gateway::sendToGroup('chat', json_encode([
                'type' => 'join',
                'data' => $data,
            ], JSON_UNESCAPED_UNICODE));
        }

        Gateway::joinGroup($client_id, 'chat');

        $clients = [];

        foreach (Gateway::getClientSessionsByGroup('chat') as $value) {
            $clients[$value['id']] = [
                'id'         => $value['id'],
                'first_name' => $value['first_name'],
                'write' => false
            ];
        }

        return json([
            'chat'  => Chat::allById(0),
            'users' => array_values($clients),
        ]);
    }

    public function add($id)
    {
        $chat = Chat::addById($id);

        return json($chat);
    }

    public function store(ChatRequest $request)
    {
        $request->setAttributes('name', auth()->first_name);
        $message = Chat::create($request);
        Gateway::sendToGroup('chat', json_encode([
            'type' => 'message',
            'user_id' => auth()->id,
            'data' => [
                'id'         => $message->id,
                'name'       => $message->name,
                'message'    => $message->message,
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ], JSON_UNESCAPED_UNICODE));

        return json(['status' => 1]);
    }
}
