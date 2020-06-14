@extends('layout.app')
@section('title', "Редактирование статьи")
@section('content')

<h2>Изменение статьи</h2>
<hr>
@include('layout.errors')
<form action="{{ route('posts.update', ['post' => $post->slug]) }}" method="post">
    @csrf
    @method('PUT')
    @include('posts.form')
</form>

@endsection
