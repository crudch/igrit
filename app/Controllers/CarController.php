<?php

namespace App\Controllers;

use App\Models\Car;
use Crudch\Foundation\Controller;
use Crudch\Http\Exceptions\NotFoundException;

class CarController extends Controller
{
    public function index()
    {
        return json(Car::all());
    }

    /**
     * @param $id
     *
     * @return \Crudch\Http\Response
     * @throws NotFoundException
     */
    public function show($id)
    {
        if (!$car = Car::findById($id)) {
            throw new NotFoundException('Машинка не найдена');
        }

        return json($car);
    }
}
