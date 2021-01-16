<?php

namespace App;


class PostHistory extends Model
{
    public static $tagCache = 'histories';

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function post()
    {
        return $this->belongsTo(\App\Post::class);
    }

    public static function boot()
    {
        parent::boot();
    }
}
