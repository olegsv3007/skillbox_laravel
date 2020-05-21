<?php

namespace App\Console\Commands;

use App\Mail\SendNewPosts;
use Carbon\Carbon;
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
        $dateFrom = is_null($this->argument('dateFrom')) ? (new Carbon())->subWeek() : new Carbon($this->argument('dateFrom'));
        $dateTo = is_null($this->argument('dateTo')) ? Carbon::now() : new Carbon($this->argument('dateTo'));

        $posts = \App\Post::period($dateFrom, $dateTo)->published()->get();
        $users = \App\User::all();

        foreach ($users as $user) {
            \Mail::to($user->email)->send(new SendNewPosts($posts));
        }
    }
}
