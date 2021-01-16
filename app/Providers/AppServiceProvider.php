<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer('layout.sidebar', function($view) {
            $tags = \Cache::tags('tags')->rememberForever('tagsCloud', function() {
                return \App\Tag::tagsCloud();
            });
            $view->with('tags', $tags);
        });

        \Blade::if('admin', function() {
            return auth()->check() && auth()->user()->isAdmin();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
