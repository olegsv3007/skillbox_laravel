<div class="comments">
    @each('comments.comment', $commentable->comments, 'comment', 'comments.comment_empty')
</div>
@can('sendComment', $commentable)
    <hr>
    <br>
    @include('comments.comment_form', ['commentable' => $commentable])
@endcan
