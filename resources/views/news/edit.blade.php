@extends('layout.app')
@section('title', "Редактирование новости")
@section('content')

<h2>Изменение новости</h2>
<hr>
@include('layout.errors')
<form action="{{ route('news.update', ['news' => $news->slug]) }}" method="post">
    @csrf
    @method('PUT')
    @include('news.form')
</form>

@endsection
