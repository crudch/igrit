<?php

namespace App\Controllers;

use App\Models\Article;
use Crudch\Http\Request;
use Crudch\Foundation\Controller;
use Crudch\Http\Exceptions\NotFoundException;

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

    /**
     * @param         $id
     * @param Request $request
     *
     * @return \Crudch\Http\Response
     * @throws NotFoundException
     */
    public function update($id, Request $request)
    {
        /** @var Article $article */
        if (!$article = Article::findById($id)) {
            throw new NotFoundException('Нет такой статьи');
        }

        $article->fill($request->all())
            ->save();

        return json(['status' => 'ok']);
    }

    public function destroy($id)
    {
        // action delete article
    }
}
