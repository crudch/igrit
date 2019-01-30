<?php

namespace App\Controllers;

use App\Models\Users\User;
use App\Requests\ProfileRequest;
use Crudch\Foundation\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::findById(auth()->id);

        return json($user);
    }

    public function save(ProfileRequest $request)
    {
        $user = User::findById(auth()->id);

        $status = $user->fill($request)
            ->save();

        return json(['status' => $status]);
    }
}
