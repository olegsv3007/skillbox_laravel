<aside class="col-md-4 blog-sidebar">
    <div class="p-4">
        <h4 class="font-italic text-center">Облако тэгов</h4>
        <ol class="list-unstyled mb-0">
            @each('layout.tag-link', $tags, 'tag')
        </ol>
    </div>
</aside>
