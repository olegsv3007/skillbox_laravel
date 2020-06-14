<?php

namespace App;

use App\Http\Requests\StoreComment;

class News extends Model
{
    use Taggable;

    protected $casts = [
        'published' => 'boolean',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopePublished($query)
    {
        return $query->where('published', '1');
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
}
