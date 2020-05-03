@extends('layout.admin.app')

@section('title', "Обратная связь")

@section('content')
<h2>Список сообщений</h2>
<hr>
<div class="row">
    <div class="col-md-12">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Email</th>
              <th scope="col">Сообщение</th>
              <th scope="col">Дата отправки</th>
            </tr>
          </thead>
          <tbody>
            @each('admin.feedbacks.item', $feedbacks, 'feedback')
          </tbody>
        </table>
    </div>
</div>
@endsection
