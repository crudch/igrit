<?php

namespace App\Controllers;

use App\Models\Chat;
use App\Requests\ChatRequest;
use Crudch\Foundation\Controller;

class ChatController extends Controller
{
    public function index($id)
    {
        $chat = Chat::allById($id);

        return json($chat);
    }

    public function store(ChatRequest $request)
    {
        Chat::create($request);

        return json(['status' => 1]);
    }
}
