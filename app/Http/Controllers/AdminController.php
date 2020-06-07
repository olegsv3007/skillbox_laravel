<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function statistics()
    {
        $data['posts_quantity'] = \App\Post::count();
        $data['news_quantity'] = \App\News::count();
        $data['top_author'] = \DB::table('posts')
            ->leftJoin('users', 'users.id', '=', 'posts.owner_id')
            ->select('users.name', \DB::raw('count(*) as total'))
            ->groupBy('owner_id')
            ->orderByDesc('total')
            ->first()
            ->name;

        $data['max_length_post'] = \DB::table('posts')
            ->select('name', 'id', 'slug', \DB::raw('length(body) as length'))
            ->orderBy('length', 'desc')
            ->first();

        $data['min_length_post'] = \DB::table('posts')
            ->select('name', 'id', 'slug', \DB::raw('length(body) as length'))
            ->orderBy('length', 'asc')
            ->first();

        $data['avg_posts_per_user'] = \DB::table('posts')
            ->select('owner_id', \DB::raw('count(id) as qty'))
            ->groupBy('owner_id')
            ->pluck('qty')
            ->avg();

        $data['unstable_post'] = \DB::table('posts')
            ->rightJoin('post_histories', 'posts.id', '=', 'post_histories.post_id')
            ->select('posts.id','posts.slug', 'posts.name', \DB::raw('count(posts.id) as qty'))
            ->groupBy('post_histories.post_id')
            ->orderBy('qty', 'desc')
            ->first();

        $data['most_popular_post'] = \DB::table('posts')
            ->rightJoin('comments', 'posts.id', '=', 'comments.commentable_id')
            ->where('comments.commentable_type', \App\Post::class)
            ->select('posts.id','posts.slug', 'posts.name', \DB::raw('count(posts.id) as qty'))
            ->groupBy('comments.commentable_id')
            ->orderBy('qty', 'desc')
            ->first();

        return view('admin.statistics', compact('data'));
    }
}
