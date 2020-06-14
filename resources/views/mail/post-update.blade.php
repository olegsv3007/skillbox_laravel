@component('mail::message')
# Introduction

Статья {{ $post->name }} была обновлена

@component('mail::button', ['url' => route('posts.show', ['post' => $post->slug])])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
