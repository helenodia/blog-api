<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\ArticleListResource;
use App\Http\Requests\ArticleRequest;
use App\Tag;

class Articles extends Controller
{
    public function index()
    {
        return ArticleListResource::collection(Article::all());
    }

    public function store(ArticleRequest $request)
    {
        $data = $request->only(["title", "article"]);
        $article->fill($data)->save();
        $article = Article::create($data)->setTags($request->get("tags"));
        return new ArticleResource($article);
    }

    public function show(Article $article)
    {
        return $article;
        return new ArticleResource($article);
    }

    public function update(ArticleRequest $request, Exercise $exercise)
    {
        $data = $request->only(["title", "article"]);
        $article->fill($data)->save();
        // use the new method - can't chain as save returns a bool
        $article->setTags($request->get("tags"));
        return new ArticleResource($article);
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return response(null, 204);
    }
}








