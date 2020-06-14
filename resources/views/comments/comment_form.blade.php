@include('layout.errors')
@if(get_class($commentable) == 'App\News')
<form method="post" action="{{ route('news.comment.send', ['news' => $commentable->slug]) }}">
@elseif(get_class($commentable) == 'App\Post')
<form method="post" action="{{ route('posts.comment.send', ['post' => $commentable->slug]) }}">
@endif
    @csrf
    <div class="form-group">
        <label for="comment">Написать комментарий</label>
        <textarea class="form-control" id="comment" name="body" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary mb-2">Отправить</button>
</form>
