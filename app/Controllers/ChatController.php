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
            ]));
        }

        Gateway::joinGroup($client_id, 'chat');

        $clients = [];

        foreach (Gateway::getClientSessionsByGroup('chat') as $value) {
            $clients[$value['id']] = [
                'id'         => $value['id'],
                'first_name' => $value['first_name'],
            ];
        }

       return json([
           'chat' => Chat::allById(0),
           'users' => array_values($clients)
       ]);
    }

    public function add($id)
    {
        $chat = Chat::addById($id);

        return json($chat);
    }

    public function store(ChatRequest $request)
    {
        Chat::create($request);

        return json(['status' => 1]);
    }
}
