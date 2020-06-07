@extends('layout.app')
@section('title', $news->name)
@section('content')

<br>
<h2>{{ $news->name }}</h2>
@each('layout.tag-link', $news->tags, 'tag')
<p>{{ \Carbon\Carbon::parse($news->created_at)->format('d F Y') }}</p>
<hr>
<br>
<p>{{ $news->body }}</p>
<hr>
<a href="/news" class="btn btn-secondary">Вернуться к новостям</a>

@admin
<a href="/news/{{ $news->slug }}/edit" class="btn btn-outline-warning mb-2 mt-2">Редактировать в административном разделе</a>
<form action="/news/{{ $news->slug }}" method="post" class="mt-3">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Удалить</button>
</form>
@endadmin
<br>
<hr>
<h2>Комментарии</h2>
@include('comments.comments', ['commentable' =>  $news])
@endsection
