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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // needs to return multiple articles
        // so we use the collection method
        return ArticleListResource::collection(Article::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $data = $request->only(["title", "article"]);
        // use the new method
        $article->fill($data)->save();
        $article = Article::create($data)->setTags($request->get("tags"));
        return new ArticleResource($article);
    }
        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    // accept the type-hinted article instead of $id
    public function show(Article $article)
    {
    // and just return it
    return $article;
    return new ArticleResource($article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
        // accept the article
    public function update(ArticleRequest $request, Article $article)
    {
        $data = $request->only(["title", "article"]);
        $article->fill($data)->save();
        // use the new method - can't chain as save returns a bool
        $article->setTags($request->get("tags"));
        return new ArticleResource($article);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
        // accept the article
    public function destroy(Article $article)
    {
        // no need to find it anymore
        $article->delete();
        return response(null, 204);
    }
}








