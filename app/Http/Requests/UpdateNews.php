<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class UpdateNews extends StoreNews
{
    public function rules()
    {
        $news = $this->route('news');

        $rules = parent::rules();
        $rules['slug'] = [
            'required',
            'regex:/([A-Za-z0-9-_]+)/',
            Rule::unique('news')->ignore($news->id),
        ];

        return $rules;
    }
}
