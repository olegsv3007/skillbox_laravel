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

    public static function boot()
    {
        parent::boot();

        static::updating(function (Post $post) {
            $fields = array_keys($post->getDirty());
            $post->histories()->create([
                'user_id'=> auth()->id(),
                'fields' => json_encode($fields),
            ]);
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopePublished($query)
    {
        return $query->where('published', '1');
    }

    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable');
    }

    public function owner()
    {
        return $this->belongsTo('App\User', 'owner_id');
    }

    public function scopePeriod($query, $dateFrom, $dateTo)
    {
        return $query->whereBetween('created_at', [$dateFrom, $dateTo]);
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function histories()
    {
        return $this->hasMany(\App\PostHistory::class, 'post_id');
    }
}
