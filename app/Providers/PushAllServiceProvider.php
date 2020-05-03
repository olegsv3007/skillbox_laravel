<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PushAllServiceProvider extends ServiceProvider
{

    public function register()
    {

    }

    public function boot()
    {
        $this->app->singleton(\App\Service\PushAll::class, function() {
            return new \App\Service\PushAll(config('pushall.api.key'), config('pushall.api.id'));
        });
    }
}
