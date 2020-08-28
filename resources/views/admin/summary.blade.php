@extends('layout.admin.app')

@section('title', 'Отчеты')

@section('content')
<h3>Отчет "Итого":</h3>
<hr>

<form method="post" action="{{ route('report-summary') }}">
    @csrf
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="news" id="news" name="params[]">
        <label class="form-check-label" for="news">Новости</label>
        <br>
        <input class="form-check-input" type="checkbox" value="posts" id="posts" name="params[]">
        <label class="form-check-label" for="posts">Статьи</label>
        <br>
        <input class="form-check-input" type="checkbox" value="comments" id="comments" name="params[]">
        <label class="form-check-label" for="comments">Комментарии</label>
        <br>
        <input class="form-check-input" type="checkbox" value="tags" id="tags" name="params[]">
        <label class="form-check-label" for="tags">Тэги</label>
        <br>
        <input class="form-check-input" type="checkbox" value="users" id="users" name="params[]">
        <label class="form-check-label" for="users">Пользователи</label>
        <br>
    </div>
    <br>
    <input type="submit" class="btn btn-primary" type="button" value="Сформировать">
</form>
<br><br>
@endsection
