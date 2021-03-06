<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Events\PostCreated;
use App\Http\Requests\StoreComment;
use App\Http\Requests\UpdatePost;
use App\News;
use App\Tag;
use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\StorePost;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->middleware('can:update,post')->only(['edit', 'update', 'destroy']);
    }

    public static function index()
    {
        $posts = Post::published()->latest()->with('tags')->get();
        return view('posts.index', compact('posts'));
    }

    public static function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public static function create()
    {
        return view('posts.create');
    }

    public static function store(StorePost $request, \App\Service\PushAll $pushAll)
    {
        $attributes = $request->validated();
        $attributes['owner_id'] = auth()->id();
        $attributes['published'] = isset($attributes['published']);

        $post = Post::create($attributes);
        $post->syncTags(request('tags'));

        $pushAll->send('Ура!', 'Статья успешно создана!');

        return redirect('/');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Post $post, UpdatePost $request)
    {
        $attributes = $request->validated();
        $attributes['published'] = isset($attributes['published']);

        $post->update($attributes);
        $post->syncTags(request('tags'));

        return redirect('/');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/');
    }

    public function adminIndex()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    public function adminEdit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function sendComment(Post $post, StoreComment $request)
    {
        $attributes = $request->validated();
        $attributes['author_id'] = auth()->id();
        $attributes['commentable_id'] = $post->id;
        $attributes['commentable_type'] = Post::class;

        Comment::create($attributes);

        return redirect()->back();
    }
}
