<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\StorePost;

class PostsController extends Controller
{
    public static function index()
    {
        $posts = Post::published()->latest()->get();
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

    public static function store(StorePost $request)
    {
        $validatedData = $request->validated();

        Post::create(request()->all());

        return redirect('/');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Post $post, StorePost $request)
    {
        $attributes = $request->validated();
        $attributes['published'] = isset($attributes['published']) ? true : false;
        $post->update($attributes);

        return redirect('/');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/');
    }
}
