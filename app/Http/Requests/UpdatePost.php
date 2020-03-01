<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePost extends StorePost
{
    public function rules()
    {
        $post = $this->route('post');
        return [
            'slug' => [
                'required',
                'regex:/([A-Za-z0-9-_]+)/',
                Rule::unique('posts')->ignore($post->id),
            ],
            'name' => 'required|min:5|max:100',
            'announce' => 'required|min:5|max:255',
            'body' => 'required',
            'published' => '',
        ];
    }
}
