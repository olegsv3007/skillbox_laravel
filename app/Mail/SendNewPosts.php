<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendNewPosts extends Mailable
{
    use Queueable, SerializesModels;

    public $posts;

    public function __construct($posts)
    {
        $this->posts = $posts;
    }

    public function build()
    {
        return $this->markdown('mail.new-posts', ['posts' => $this->posts]);
    }
}
