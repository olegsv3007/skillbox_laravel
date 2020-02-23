<?php

namespace App\Listeners;

use App\Events\PostCreate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendPostCreatedNotification
{
    public function handle(PostCreate $event)
    {
        session()->flash('message', 'Статья успешно создана');
    }
}
