<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleListResource extends JsonResource
{   
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "tags" => $this->tags->pluck("name"),
        ];
    }
    
}
