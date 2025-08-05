<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCommentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'post_id' => 'sometimes|exists:posts,id',
            'user_id' => 'sometimes|exists:users,id',
            'body' => 'sometimes|string',
        ];
    }
}