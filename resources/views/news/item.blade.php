<div class="blog-post">
    <h2 class="blog-post-title">{{ $news->name }}</h2>

    @each('layout.tag-link', $news->tags, 'tag')

    <p class="blog-post-meta">{{ \Carbon\Carbon::parse($news->created_at)->format('d F Y') }}
    <p>{{ $news->announce }}</p>
    <a class="btn btn-secondary" href="{{ route('news.show', ['news' => $news->slug]) }}">Читать далее...</a></p>
    <hr>
</div>
