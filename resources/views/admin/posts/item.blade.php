<tr>
    <td>{{ $post->name }}</td>
    <td>{{ $post->owner->name }}</td>
    <td>{{ \Carbon\Carbon::parse($post->created_at)->format('d-m-Y | h:i') }}</td>
    <td><a class="btn btn-warning" href="/admin/posts/{{$post->slug}}/edit">Редактировать</a></td>
</tr>
