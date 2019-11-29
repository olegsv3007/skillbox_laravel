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

    public static function show(Post $post)
    {
        return view('posts.show', compact('post'));   
    }
}
