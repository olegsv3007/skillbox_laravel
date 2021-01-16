<?php

namespace App;


class Comment extends Model
{
    use Cacheable;

    public static $tagCache = 'comments';

    public function commentable()
    {
        return $this->morphTo();
    }

    public function author()
    {
        return $this->belongsTo('App\User', 'author_id');
    }

    public static function boot()
    {
        parent::boot();
    }
}
