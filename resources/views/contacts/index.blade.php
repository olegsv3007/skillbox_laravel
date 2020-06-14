@extends('layout.app')

@section('title', "Контакты")

@section('content')

<h2>Контакты</h2>
<br>
<h3>Обратная связь</h3>
@include('layout.errors')
<form method="post" action="{{ route('feedback.send') }}">
    @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Email адрес:</label>
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите ваш email адрес">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Сообщение:</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="message" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Отправить</button>
</form>
@endsection
