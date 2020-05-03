@component('mail::message')
# Introduction

У нас появились новые статьи:
<br>
@foreach($posts as $post)
@component('mail::button', ['url' => $app['url']->to('/') . "/posts/$post->slug"])
    {{ $post->name }}
@endcomponent
<hr>
@endforeach

Thanks,<br>
{{ config('app.name') }}
@endcomponent
