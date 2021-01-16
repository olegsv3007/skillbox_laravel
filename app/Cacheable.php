<?php

namespace App;

trait Cacheable
{
    public static function bootCacheable()
    {
        static::created(function($item) {
            \Cache::tags(get_class($item)::$tagCache)->flush();
        });

        static::updated(function($item) {
            \Cache::tags(get_class($item)::$tagCache)->flush();
        });

        static::deleted(function($item) {
            \Cache::tags(get_class($item)::$tagCache)->flush();
        });
    }
}
