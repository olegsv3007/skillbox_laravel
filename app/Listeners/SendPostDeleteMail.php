<?php

namespace App\Listeners;


use App\Events\PostDelete;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendPostDeleteMail
{
    public function handle(PostDelete $event)
    {
        \Mail::to(config("app.admin_email"))->send(new \App\Mail\PostDelete($event->post));
    }
}
