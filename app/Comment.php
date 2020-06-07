<?php

namespace App;


class Comment extends Model
{
    public function commentable()
    {
        return $this->morphTo();
    }

    public function author()
    {
        return $this->belongsTo('App\User', 'author_id');
    }
}
