@extends('layout.app')
@section('title', $post->name)
@section('content')

<br>
<h2>{{ $post->name }}</h2>
@each('layout.tag-link', $post->tags, 'tag')
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
<br>
<hr>
<h2>История изменений</h2>
<table class="table">
    <thead>
    <tr>
        <th scope="col">Пользователь</th>
        <th scope="col">Дата изменений</th>
        <th scope="col">Поля</th>
    </tr>
    </thead>
    <tbody>
    @forelse($post->histories as $item)
        <tr>
            <th scope="col">{{ $item->user->name }}</th>
            <th scope="col">{{ $item->created_at->diffForHumans() }}</th>
            <th scope="col">{{ implode(json_decode($item->fields), ', ') }}</th>
        </tr>
    @empty
        <tr>
            <th class="text-center" scope="col" colspan="3">Нет изменений</th>
        </tr>
    @endforelse
    </tbody>
</table>
<br>
<hr>
<h2>Комментарии</h2>
@include('comments.comments', ['commentable' =>  $post])

@endsection
