@extends('layout.app')
@section('title', "Редактирование статьи")
@section('content')

<h2>Создание статьи</h2>
<hr>
@include('layout.errors')
<form action="/posts/{{ $post->slug }}" method="post">
    @csrf
    @method('PUT')
  <div class="form-group">
    <label for="slug">Символьный код</label>
    <input
        type="text"
        class="form-control"
        name="slug"
        id="slug"
        placeholder="Введите символьный код"
        value="{{ old('slug') ?? $post->slug }}">
  </div>
  <div class="form-group">
    <label for="name">Название статьи</label>
    <input
        type="text"
        name="name"
        class="form-control"
        id="name"
        placeholder="Введите название статьи"
        value="{{ old('name') ?? $post->name }}">
  </div>
  <div class="form-group">
    <label for="announce">Краткое описани статьи</label>
    <textarea
        class="form-control"
        id="announce"
        name="announce"
        rows="3">{{ old('announce') ?? $post->announce }}
    </textarea>
  </div>
  <div class="form-group">
    <label for="body">Детальное описани</label>
    <textarea
        class="form-control"
        id="body"
        name="body"
        rows="7">{{ old('body') ?? $post->body }}
    </textarea>
  </div>
  <div class="form-group form-check">
    <input
        type="checkbox"
        class="form-check-input"
        name="published"
        {{ $post->published ? 'checked' : ''}}
        id="published">
    <label class="form-check-label" for="published">Опубликовано</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
