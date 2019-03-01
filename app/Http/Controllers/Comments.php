<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Comment;
use App\Http\Requests\CommentRequest;
use App\Http\Resources\CommentResource;

class Comments extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Article $article)
    {
    // use the comments property of the article model
    // return a collection of comments
    return CommentResource::collection($article->comments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
        

    // we need to accept Request first, using type hinting
    // and then use route model binding to get the relevant
    // article from the URL parameter
    public function store(CommentRequest $request, Article $article)
    {
        // create a new comment, passing in the data from the request JSON
        $comment = new Comment($request->all());
        // this syntax is a bit odd, but it's in the documentation
        // stores the comment in the DB while setting the article_id
        $article->comments()->save($comment);
        // return the stored comment
        // return a single comment
        return new CommentResource($comment);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
