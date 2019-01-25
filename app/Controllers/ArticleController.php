<?php

namespace App\Controllers;

use App\Models\Article;
use Crudch\Foundation\Controller;
use Crudch\Http\Request;

class ArticleController extends Controller
{
    /**
     * Show all methods
     *
     * @return \Crudch\Http\Response
     */
    public function all()
    {
        return view('index');
    }

    public function index()
    {
        return json(Article::all('desc'));
    }

    public function show($id)
    {
        // show single article
    }

    public function create()
    {
        // show form for create article
    }

    public function store(Request $request)
    {
        // action add article
    }

    public function edit($id)
    {
        // show form for update article
    }

    public function update($id, Request $request)
    {
        // action update article
    }

    public function destroy($id)
    {
        // action delete article
    }
}
