<?php

namespace App;

use App\Http\Requests\StoreComment;

class News extends Model
{
    use Taggable;
    use Cacheable;

    public static $tagCache = 'news';

    protected $casts = [
        'published' => 'boolean',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public static function boot()
    {
        parent::boot();

        static::deleted(function() {
            \Cache::tags('news', 'tags')->flush();
        });
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
