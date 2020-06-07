@extends("layout.app")
@section('title', "Статьи и новости по тегу")
@section('content')

    <div class="col-md-8 blog-main">
        <h3 class="pb-4 mb-4 font-italic border-bottom">Статьи</h3>
        @each('posts.item', $posts, 'post')
    </div>
    <div class="col-md-8 blog-main">
        <h3 class="pb-4 mb-4 font-italic border-bottom">Новости</h3>
        @each('news.item', $allNews, 'news')
    </div>

@endsection
