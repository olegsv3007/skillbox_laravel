<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SummaryReport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $params;

    public function __construct($params)
    {
        $this->params = $params;
    }

    public function handle()
    {
        $reportData = [];
        if (in_array('news', $this->params)) {
            $reportData['Новости'] = \App\News::count();
        }
        if (in_array('posts', $this->params)) {
            $reportData['Статьи'] = \App\Post::count();
        }
        if (in_array('comments', $this->params)) {
            $reportData['Комментарии'] = \App\Comment::count();
        }
        if (in_array('tags', $this->params)) {
            $reportData['Теги'] = \App\Tag::count();
        }
        if (in_array('users', $this->params)) {
            $reportData['Пользователи'] = \App\User::count();
        }
        \Mail::to(auth()->user()->email)->send(new \App\Mail\SummaryReport($reportData));
    }
}
