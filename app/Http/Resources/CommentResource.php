<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    public function toArray($request)
    {
        return [
        "id" => $this->id,
        "email" => $this->email,
        "comment" => $this->comment,
        ];    
    }
}


