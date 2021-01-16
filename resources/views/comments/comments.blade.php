<div class="comments">
    @each('comments.comment', $comments, 'comment', 'comments.comment_empty')
</div>
@can('sendComment', $comments)
    <hr>
    <br>
@endcan
