<?php

namespace App\Providers;

use App\Events\PostCreate;
use App\Events\PostDelete;
use App\Events\PostUpdate;
use App\Listeners\SendPostCreatedNotification;
use App\Listeners\SendPostCreateMail;
use App\Listeners\SendPostDeleteNotification;
use App\Listeners\SendPostDeleteMail;
use App\Listeners\SendPostUpdateNotification;
use App\Listeners\SendPostUpdateMail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        PostCreate::class => [
            SendPostCreatedNotification::class,
            SendPostCreateMail::class,
        ],
        PostUpdate::class => [
            SendPostUpdateNotification::class,
            SendPostUpdateMail::class,
        ],
        PostDelete::class => [
            SendPostDeleteNotification::class,
            SendPostDeleteMail::class,
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
