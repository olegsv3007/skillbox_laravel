@extends('layout.admin.app')

@section('title', "Обратная связь")

@section('content')

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

@endsection