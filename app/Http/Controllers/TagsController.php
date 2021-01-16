<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function index(Tag $tag)
    {
        $posts = \Cache::tags('posts', 'tags')->remember('posts_for_tag_' . $tag->name, now()->addHour(), function() use($tag) {
            return $tag->posts()->published()->latest()->get();
        });

        $allNews = \Cache::tags('news', 'tags')->remember('news_for_tag_' . $tag->name, now()->addHour(), function() use($tag) {
            return $tag->news()->published()->latest()->get();
        });

        return view('tags', compact(['posts', 'allNews']));
    }
}
