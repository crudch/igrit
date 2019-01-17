<?php

namespace App\Controllers;

use Crudch\Foundation\Controller;

class MaxController extends Controller
{
    public function index()
    {
        return view('index', [
            'asset' => 'max',
        ]);
    }
}
