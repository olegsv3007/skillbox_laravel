@component('mail::message')
# Introduction

Статья {{ $post->name }} была удалена


Thanks,<br>
{{ config('app.name') }}
@endcomponent
