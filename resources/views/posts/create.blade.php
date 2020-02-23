@extends('layout.app')
@section('title', "Создание статьи")
@section('content')

<h2>Создание статьи</h2>
<hr>
@include('layout.errors')
<form action="/posts" method="post">
    @csrf
  <div class="form-group">
    <label for="slug">Символьный код</label>
    <input type="text" class="form-control" name="slug" id="slug" placeholder="Введите символьный код">
  </div>
  <div class="form-group">
    <label for="name">Название статьи</label>
    <input type="text" name="name" class="form-control" id="name" placeholder="Введите название статьи">
  </div>
  <div class="form-group">
    <label for="announce">Краткое описани статьи</label>
    <textarea class="form-control" id="announce" name="announce" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="body">Детальное описани</label>
    <textarea class="form-control" id="body" name="body" rows="7"></textarea>
  </div>
  <div class="form-group">
    <label for="tags">Теги(Тэг1|Тэг2| ...)</label>
    <input type="text" name="tags" class="form-control" id="tags" placeholder="Введите тэги стать через |">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" name="published" value="1" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Опубликовано</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
