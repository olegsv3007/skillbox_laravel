<?php

namespace App\Http\Controllers;

use App\Events\PostCreated;
use App\Http\Requests\UpdatePost;
use App\Tag;
use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\StorePost;

class PostsController extends Controller
{
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

    public static function store(StorePost $request)
    {
        $attributes = $request->validated();

        $post = Post::create($attributes);

        $tagsToAttach = collect(explode('|', request('tags')))->keyBy(function($item) { return $item; });

        foreach ($tagsToAttach as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);
            $post->tags()->attach($tag);
        }

        return redirect('/');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Post $post, UpdatePost $request)
    {
        $attributes = $request->validated();
        $attributes['published'] = isset($attributes['published']) ? true : false;
        $post->update($attributes);

        $postTags = $post->tags->keyBy('name');
        $tags = collect(explode('|', request('tags')))->keyBy(function($item) { return $item; });

        $tagsToAttach = $tags->diffKeys($postTags);
        $tagsToDetach = $postTags->diffKeys($tags);


        foreach ($tagsToAttach as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);
            $post->tags()->attach($tag);
        }

        foreach ($tagsToDetach as $tag) {
            $post->tags()->detach($tag);
        }

        return redirect('/');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/');
    }
}
