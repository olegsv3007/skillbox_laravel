@extends('layout.app')
@section('title', "Создание статьи")
@section('content')

<h2>Создание статьи</h2>
<hr>
@include('layout.errors')
<form action="/posts" method="post">
    @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Символьный код</label>
    <input type="text" class="form-control" name="slug" id="exampleInputEmail1" placeholder="Введите символьный код">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Название статьи</label>
    <input type="text" name="name" class="form-control" id="exampleInputPassword1" placeholder="Введите название статьи">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Краткое описани статьи</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="announce" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Детальное описани</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="body" rows="7"></textarea>
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" name="published" value="1" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Опубликовано</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection