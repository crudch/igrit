<?php

namespace App\Controllers;

use App\Models\Product;
use Crudch\Foundation\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return json($products);
    }
}
