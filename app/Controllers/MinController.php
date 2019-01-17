<?php

namespace App\Controllers;

use Crudch\Foundation\Controller;

class MinController extends Controller
{
    public function index()
    {
        return view('index', [
            'asset' => 'min',
        ]);
    }
}
