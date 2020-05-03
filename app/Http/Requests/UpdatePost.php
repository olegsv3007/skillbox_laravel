<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePost extends StorePost
{
    public function rules()
    {
        $post = $this->route('post');

        $rules = parent::rules();
        $rules['slug'] = [
            'required',
            'regex:/([A-Za-z0-9-_]+)/',
            Rule::unique('posts')->ignore($post->id),
        ];

        return $rules;
    }
}
