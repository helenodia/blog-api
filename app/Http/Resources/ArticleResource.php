<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // just show the id, title, and article properties
        // $this represents the current article
        return [
        "id" => $this->id,
        "title" => $this->title,
        "article" => $this->article,
        "tags" => $this->tags->pluck("name"),
        ];
    }
}
