@extends('layout.admin.app')

@section('title', 'Статистика')

@section('content')
<h2>Статистика</h2>
<table class="table">
    <tr>
        <td>Общее количество статей</td>
        <td>{{ $data['posts_quantity'] }}</td>
    </tr>
    <tr>
        <td>Общее количество новостей</td>
        <td>{{ $data['news_quantity'] }}</td>
    </tr>
    <tr>
        <td>ФИО автора, у которого больше всего статей на сайте</td>
        <td>{{ $data['top_author'] }}</td>
    </tr>
    <tr>
        <td>Самая длинная статья - название, ссылка на статью и длина статьи в символах</td>
        <td><a href="/posts/{{ $data['max_length_post']->slug }}">{{ $data['max_length_post']->name }}</a> - длина: {{ $data['max_length_post']->length }}</td>
    </tr>
    <tr>
        <td>Самая короткая статья - название, ссылка на статью и длина статьи в символах</td>
        <td>
            <a href="/posts/{{ $data['min_length_post']->slug }}">{{ $data['min_length_post']->name }}</a> - длина: {{ $data['min_length_post']->length }}
        </td>
    </tr>
    <tr>
        <td>Средние количество статей у “активных” пользователей, при этом активным пользователь считается, если у него есть более 1-й статьи</td>
        <td>{{ $data['avg_posts_per_user'] }}</td>
    </tr>
    <tr>
        <td>Самая непостоянная - название, ссылка на статью, которую меняли больше всего раз</td>
        <td><a href="/posts/{{ $data['unstable_post']->slug }}">{{ $data['unstable_post']->name }}</a></td>
    </tr>
    <tr>
        <td>Самая обсуждаемая статья  - название, ссылка на статью, у которой больше всего комментариев</td>
        <td><a href="/posts/{{ $data['most_popular_post']->slug }}">{{ $data['most_popular_post']->name }}</a></td>
    </tr>
</table>
@endsection
