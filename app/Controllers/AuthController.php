<?php

namespace App\Controllers;

use App\Models\Users\User;
use Crudch\Foundation\Controller;
use App\Requests\RegistrationRequest;

class AuthController extends Controller
{
    public function registration(RegistrationRequest $request)
    {
        $request->setAttributes([
            'password' => password_hash($request->input('password'), PASSWORD_DEFAULT),
            'token'    => token($request->input('email')),
        ]);

        $article = User::create($request);

        return json([
            'id'         => $article->id,
            'token'      => $article->token,
            'first_name' => $article->first_name,
        ]);
    }
}
