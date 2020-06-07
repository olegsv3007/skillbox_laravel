<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreComment extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'body' => 'required',
            'commentable_id' => 'required',
            'commentable_type' => 'required',
        ];
    }
}
