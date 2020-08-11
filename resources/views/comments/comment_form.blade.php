@include('layout.errors')
<form method="post" action="{{ $url }}">
    @csrf
    <div class="form-group">
        <label for="comment">Написать комментарий</label>
        <textarea class="form-control" id="comment" name="body" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary mb-2">Отправить</button>
</form>
