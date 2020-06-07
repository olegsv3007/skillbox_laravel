<div class="comment">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $comment->author->name }}</h5>
            <p class="card-text">{{ $comment->body }}</p>
            <p class="card-text"><small class="text-muted">{{ $comment->created_at }}</small></p>
        </div>
    </div>
</div>
<br>
