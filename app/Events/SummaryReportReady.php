<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SummaryReportReady implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $reportData;
    public $userId;

    public function __construct($reportData, $userId)
    {
        $this->reportData = $reportData;
        $this->userId = $userId;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('report.' . $this->userId);
    }
}
