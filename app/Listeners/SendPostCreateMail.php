<?php

namespace App\Listeners;

use App\Events\PostCreate;
use App\Mail\PostCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendPostCreateMail
{
    public function handle(PostCreate $event)
    {
        //\Mail::to(config("app.admin_email"))->send(new PostCreated($event->post));
    }
}
