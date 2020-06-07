@extends('layout.app')
@section('title', "Создание новости")
@section('content')

<h2>Создание Новости</h2>
<hr>
@include('layout.errors')
<form action="/news" method="post">
    @csrf
    @include('news.form')
</form>

@endsection
