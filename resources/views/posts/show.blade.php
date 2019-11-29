@extends('layout.app')
@section('title', $post->name)
@section('content')

<br>
<h2>{{ $post->name }}</h2>
<p>{{ \Carbon\Carbon::parse($post->created_at)->format('d F Y') }}</p>
<hr>
<br>
<p>{{ $post->body }}</p>
<hr>
<a href="/" class="btn btn-secondary">Вернуться на главную</a>

@endsection