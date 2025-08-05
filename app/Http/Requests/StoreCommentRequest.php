<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'post_id' => 'required|exists:posts,id',
            'user_id' => 'required|exists:users,id',
            'body' => 'required|string',
        ];
    }
}