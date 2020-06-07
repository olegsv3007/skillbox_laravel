<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNews;
use App\Http\Requests\UpdateNews;
use App\News;
use App\Tag;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->middleware('can:update,news')->only(['edit', 'update', 'destroy']);
    }

    public function index()
    {
        $allNews = News::published()->latest()->get();
        return view('news.index', compact('allNews'));
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(StoreNews $request)
    {
        $attributes = $request->validated();

        $news = News::create($attributes);

        $tagsToAttach = collect(explode('|', request('tags')))->keyBy(function($item) { return $item; });

        foreach ($tagsToAttach as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);
            $news->tags()->attach($tag);
        }

        return redirect('/news');
    }

    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    public function edit(News $news)
    {
        return view('news.edit', compact('news'));
    }

    public function update(UpdateNews $request, News $news)
    {
        $attributes = $request->validated();
        $news->update($attributes);

        $newsTags = $news->tags->keyBy('name');
        $tags = collect(explode('|', request('tags')))->keyBy(function($item) { return $item; });

        $tagsToAttach = $tags->diffKeys($newsTags);
        $tagsToDetach = $newsTags->diffKeys($tags);


        foreach ($tagsToAttach as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);
            $news->tags()->attach($tag);
        }

        foreach ($tagsToDetach as $tag) {
            $news->tags()->detach($tag);
        }

        return redirect('/news');
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect('/news');
    }
}
