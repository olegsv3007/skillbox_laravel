<div class="blog-post">
    <h2 class="blog-post-title">{{ $post->name }}</h2>

    @each('posts.tag-link', $post->tags, 'tag')

    <p class="blog-post-meta">{{ \Carbon\Carbon::parse($post->created_at)->format('d F Y') }}
    <p>{{ $post->announce }}</p>
    <a class="btn btn-secondary" href="/posts/{{ $post->slug }}">Читать далее...</a></p>
    <hr>
</div>
