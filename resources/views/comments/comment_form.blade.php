@include('layout.errors')
<form method="post" action="{{ route('comment.send') }}">
    @csrf
    <input type="hidden" name="commentable_id" value="{{ $commentable->id }}">
    <input type="hidden" name="commentable_type" value="{{ get_class($commentable) }}">
    <div class="form-group">
        <label for="comment">Написать комментарий</label>
        <textarea class="form-control" id="comment" name="body" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary mb-2">Отправить</button>
</form>
