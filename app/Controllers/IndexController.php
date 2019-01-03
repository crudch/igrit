<?php

namespace App\Controllers;

use Crudch\Foundation\Controller;

class IndexController extends Controller
{
    public function index()
    {
        var_dump(
            password_hash('123', PASSWORD_DEFAULT),
            token('test')
        );
    }
}
