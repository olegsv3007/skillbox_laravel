@extends('layout.admin.app')

@section('title', "Управление статьями")

@section('content')
    <h2>Список статей</h2>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Заголовок</th>
                    <th scope="col">Автор</th>
                    <th scope="col">Дата Публикации</th>
                    <th scope="col">Редактировать</th>
                </tr>
                </thead>
                <tbody>
                @each('admin.posts.item', $posts, 'post')
                </tbody>
            </table>
        </div>
    </div>
@endsection
