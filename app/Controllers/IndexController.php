<?php

namespace App\Controllers;

use App\Models\Users\AuthUser;
use Crudch\Foundation\Controller;

class IndexController extends Controller
{
    public function index()
    {
        var_dump(
           auth()
        );
    }
}
