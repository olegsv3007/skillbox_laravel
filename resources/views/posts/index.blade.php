@extends("layout.app")
@section('title', "Главная")
@section('content')

<div class="col-md-8 blog-main">
    <h3 class="pb-4 mb-4 font-italic border-bottom">Статьи</h3>
    @each('posts.item', $posts, 'post')
</div>

@endsection