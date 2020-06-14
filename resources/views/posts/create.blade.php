@extends('layout.app')
@section('title', "Создание статьи")
@section('content')

<h2>Создание статьи</h2>
<hr>
@include('layout.errors')
<form action="{{ route('posts.store') }}" method="post">
    @csrf
    @include('posts.form')
</form>

@endsection
