<?php

namespace App\Controllers;

use App\Models\Users\User;

trait UserResponse
{
    protected function responseUser(User $user)
    {
        return json([
            'id'         => $user->id,
            'email'      => $user->email,
            'token'      => $user->token,
            'first_name' => $user->first_name,
        ]);
    }
}
