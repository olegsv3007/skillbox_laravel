<?php

namespace App\Listeners;

use App\Events\PostDelete;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendPostDeleteNotification
{
    public function handle(PostDelete $event)
    {
        session()->flash('message', 'Статья успешно удалена');
    }
}
