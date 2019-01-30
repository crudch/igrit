<?php

namespace App\Controllers;

use App\Models\Users\User;
use App\Requests\LoginRequest;
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

        $user = User::create($request);

        return $this->responseUser($user);
    }

    public function login(LoginRequest $request)
    {
        $user = User::findByField('email', $request->input('email'));

        if (!password_verify($request->input('password'), $user->password)) {
            return json(['errors' => ['password' => 'Неверный пароль']], 422);
        }

        return $this->responseUser($user);
    }


    protected function responseUser(User $user)
    {
        return json([
            'token'      => $user->token,
            'first_name' => $user->first_name,
        ]);
    }
}
