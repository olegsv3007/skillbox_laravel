@component('mail::message')
# Introduction

Была добавлена статья: {{ $post->name }}

@component('mail::button', ['url' => $app['url']->to('/') . "/posts/$post->slug"])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
