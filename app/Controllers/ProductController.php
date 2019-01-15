<?php

namespace App\Controllers;

use App\Models\Product;
use Crudch\Http\Request;
use Crudch\Foundation\Controller;
use Crudch\Http\Exceptions\NotFoundException;

class ProductController extends Controller
{
    /**
     * @return \Crudch\Http\Response
     */
    public function index()
    {
        return json(Product::all('desc'));
    }

    /**
     * @param $id
     *
     * @return \Crudch\Http\Response
     * @throws NotFoundException
     */
    public function show($id)
    {
        if (!$product = Product::findById($id)) {
            throw new NotFoundException('Продукт не найден');
        }

        return json($product);
    }

    /**
     * @param Request $request
     *
     * @return \Crudch\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::create($request->all());

        return json(['status' => 1, 'product' => $product]);
    }

    /**
     * @param Request $request
     *
     * @return \Crudch\Http\Response
     * @throws NotFoundException
     */
    public function update(Request $request)
    {
        if (!$product = Product::findById($request->input('id'))) {
            throw new NotFoundException('Продукт не найден');
        }

        $product->fill($request->all())
            ->save();

        return json(['status' => 1, 'product' => $product]);
    }

    /**
     * @param int $id
     *
     * @return \Crudch\Http\Response
     */
    public function destroy($id)
    {
        return json(['status' => Product::delete($id)]);
    }
}
