@component('mail::message')
# Introduction

Статья {{ $post->name }} была обновлена

@component('mail::button', ['url' => $app['url']->to('/') . "/posts/$post->slug"])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
