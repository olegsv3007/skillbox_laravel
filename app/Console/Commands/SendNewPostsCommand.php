<?php

namespace App\Console\Commands;

use App\Mail\SendNewPosts;
use Illuminate\Console\Command;

class SendNewPostsCommand extends Command
{
    protected $signature = 'newsletter:send {dateFrom?} {dateTo?}';

    protected $description = 'Команда отправляет всем пользователям новости за указанный промежуток премени yyyy-mm-dd hh:mm:ss';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $dateFrom = $this->argument('dateFrom') ?? date("Y-m-d H:i:s", time() - 7 * 24 * 60 * 60);
        $dateTo = $this->argument('dateTo') ?? date("Y-m-d H:i:s", time());

        $posts = \App\Post::period($dateFrom, $dateTo)->published()->get();
        $users = \App\User::all();
        foreach ($users as $user) {
            \Mail::to($user->email)->send(new SendNewPosts($posts));
        }
    }
}
