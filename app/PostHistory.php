<?php

namespace App;


class PostHistory extends Model
{
    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function post()
    {
        return $this->belongsTo(\App\Post::class);
    }
}
