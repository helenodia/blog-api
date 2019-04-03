<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    public function toArray($request)
    {
        return [
        "id" => $this->id,
        "title" => $this->title,
        "article" => $this->article,
        "tags" => $this->tags->pluck("name"),
        ];
    }
}
