<?php

namespace App\Controllers;

use App\Models\Car;
use Crudch\Foundation\Controller;

class CarController extends Controller
{
    public function index()
    {
        return json(Car::all());
    }
}
