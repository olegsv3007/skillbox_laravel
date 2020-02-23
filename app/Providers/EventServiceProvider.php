<?php

namespace App\Providers;

use App\Events\PostCreate;
use App\Events\PostDelete;
use App\Events\PostUpdate;
use App\Listeners\SendPostCreatedNotification;
use App\Listeners\SendPostDeleteNotification;
use App\Listeners\SendPostUpdateNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        PostCreate::class => [
            SendPostCreatedNotification::class,
        ],
        PostUpdate::class => [
            SendPostUpdateNotification::class,
        ],
        PostDelete::class => [
            SendPostDeleteNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
