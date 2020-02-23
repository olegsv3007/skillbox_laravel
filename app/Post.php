<?php

namespace App;

use App\Events\PostCreate;
use App\Events\PostDelete;
use App\Events\PostUpdate;

class Post extends Model
{
    protected $casts = [
        'published' => 'boolean',
    ];

    protected $dispatchesEvents = [
        'created' => PostCreate::class,
        'updated' => PostUpdate::class,
        'deleted' => PostDelete::class,
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopePublished($query)
    {
        return $query->where('published', '1');
    }

    public function Tags()
    {
        return $this->belongsToMany('App\Tag', 'tag_post');
    }
}
