<?php

namespace App\Controllers;

use Crudch\Foundation\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return view('index', [
            'username' => 'Vasya',
        ]);
    }

    public function comp1()
    {
        return view('Vue/comp-1');
    }
}
