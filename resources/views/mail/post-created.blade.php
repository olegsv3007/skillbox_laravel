@component('mail::message')
# Introduction

Была добавлена статья: {{ $post->name }}

@component('mail::button', ['url' => "http://192.168.100.12/posts/$post->slug"])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
