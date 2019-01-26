<?php

namespace App\Controllers;

use App\Models\Article;
use Crudch\Foundation\Controller;
use Crudch\Http\Exceptions\NotFoundException;
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

    /**
     * @return \Crudch\Http\Response
     */
    public function index()
    {
        return json(Article::all('desc'));
    }

    /**
     * @param $id
     *
     * @return \Crudch\Http\Response
     * @throws NotFoundException
     */
    public function show($id)
    {
        if (!$article = Article::findById($id)) {
            throw new NotFoundException('Нет такой статьи');
        }

        return json($article);
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
