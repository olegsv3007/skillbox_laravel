<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\StoreComment;
use Illuminate\Http\Request;


class CommentsController extends Controller
{
    public function send(StoreComment $request)
    {
        $attributes = $request->validated();
        $attributes['author_id'] = auth()->id();

        Comment::create($attributes);

        return redirect()->back();
    }
}
