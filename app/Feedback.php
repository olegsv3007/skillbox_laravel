<?php

namespace App;

class Feedback extends Model
{
    use Cacheable;

    public $table = 'feedbacks';

    public static $tagCache = 'feedbacks';

    public static function boot()
    {
        parent::boot();
    }
}
