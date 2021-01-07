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

    public static function boot()
    {
        parent::boot();

        static::created(function() {
            \Cache::forget('news');
            \Cache::tags('stats')->forget('news_quantity');
        });
        static::updated(function() {
            \Cache::forget('news');
        });
        static::deleted(function() {
            \Cache::forget('news');
            \Cache::tags('stats')->forget('news_quantity');
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
