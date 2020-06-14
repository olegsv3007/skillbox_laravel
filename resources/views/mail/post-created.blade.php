@component('mail::message')
# Introduction

Была добавлена статья: {{ $post->name }}

@component('mail::button', ['url' => route('posts.show', ['post' => $post->slug])])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
