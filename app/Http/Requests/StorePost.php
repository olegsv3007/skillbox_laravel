<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePost extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $post = $this->route('post');
        return [
            'slug' => 'required|unique:posts|regex:/([A-Za-z0-9-_]+)/',
            'name' => 'required|min:5|max:100',
            'announce' => 'required|min:5|max:255',
            'body' => 'required',
            'published' => '',
        ];
    }
}
