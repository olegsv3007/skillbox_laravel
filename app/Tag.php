<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends \App\Model
{

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function posts()
    {
        return $this->belongsToMany('App\Post', 'tag_post');
    }

    public static function tagsCloud()
    {
        return (new static)->has('posts')->get();
    }
}
