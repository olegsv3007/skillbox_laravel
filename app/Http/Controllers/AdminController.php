<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function statistics()
    {
        $data['posts_quantity'] = \App\Post::count();

        $data['news_quantity'] = \App\News::count();

        $data['top_author'] = \App\User::withCount('posts')
            ->orderBy('posts_count', 'desc')
            ->first()
            ->name;

        $data['max_length_post'] = \App\Post::select('name', 'id', 'slug', \DB::raw('length(body) as length'))
            ->orderBy('length', 'desc')
            ->first();

        $data['min_length_post'] = \App\Post::select('name', 'id', 'slug', \DB::raw('length(body) as length'))
            ->orderBy('length', 'asc')
            ->first();

        $data['avg_posts_per_user'] = \App\User::whereHas('posts')
            ->withCount('posts')
            ->get()
            ->avg('posts_count');

        $data['unstable_post'] = \App\Post::withCount('histories')
            ->orderBy('histories_count', 'desc')
            ->first();

        $data['most_popular_post'] = \App\Post::withCount('comments')
            ->orderBy('comments_count', 'desc')
            ->first();

        return view('admin.statistics', compact('data'));
    }
}
