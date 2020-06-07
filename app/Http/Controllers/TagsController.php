<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function index(Tag $tag)
    {
        $posts = $tag->posts()->published()->latest()->get();
        $allNews = $tag->news()->published()->latest()->get();
        return view('tags', compact(['posts', 'allNews']));
    }
}
