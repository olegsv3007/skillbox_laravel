<div class="comments">
    @each('comments.comment', $commentable->comments, 'comment', 'comments.comment_empty')
</div>
@can('sendComment', $commentable)
    <hr>
    <br>
@endcan
