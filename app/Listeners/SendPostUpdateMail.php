<?php

namespace App\Listeners;

use \App\Events\PostUpdate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendPostUpdateMail
{
    public function handle(PostUpdate $event)
    {
        \Mail::to(config('app.admin_email'))->send(new \App\Mail\PostUpdate($event->post));
    }
}
