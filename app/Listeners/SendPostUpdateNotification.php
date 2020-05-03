<?php

namespace App\Listeners;

use App\Events\PostUpdate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendPostUpdateNotification
{
    public function handle(PostUpdate $event)
    {
        session()->flash('message', 'Статья успешно обновлена');
    }
}
