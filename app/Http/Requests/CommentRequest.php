<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // required, use email validation rule
            // and VARCHAR(100), so make sure no longer than 100
            "email" => ["required", "email", "max:100"],
            // required and a string
            "comment" => ["required", "string"],
        ];
    }
}


