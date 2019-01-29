<?php

namespace App\Controllers;

use App\Models\Users\User;
use Crudch\Foundation\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::findById(auth()->id);

        return json($user);
    }
}
