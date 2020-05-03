@extends('layout.app')
@section('title', $post->name)
@section('content')

<br>
<h2>{{ $post->name }}</h2>
@each('posts.tag-link', $post->tags, 'tag')
<p>{{ \Carbon\Carbon::parse($post->created_at)->format('d F Y') }}</p>
<hr>
<br>
<p>{{ $post->body }}</p>
<hr>
<a href="/" class="btn btn-secondary">Вернуться на главную</a>
@can('update', $post)
@admin
<a href="/admin/posts/{{ $post->slug }}/edit" class="btn btn-outline-warning mb-2 mt-2">Редактировать в административном разделе</a>
@else
<a href="/posts/{{ $post->slug }}/edit" class="btn btn-warning">Редактировать</a>
<form action="/posts/{{ $post->slug }}" method="post" class="mt-3">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Удалить</button>
</form>
@endadmin
@endcan

@endsection
