<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends \App\Model
{
    use Cacheable;

    public static $tagCache = 'tags';

    public function getRouteKeyName()
    {
        return 'name';
    }

    public static function boot()
    {
        parent::boot();
    }

    public function posts()
    {
        return $this->morphedByMany('App\Post', 'taggable');
    }

    public function news()
    {
        return $this->morphedByMany('App\News', 'taggable');
    }

    public static function tagsCloud()
    {
        return (new static)->has('posts')->orHas('news')->get();
    }
}
