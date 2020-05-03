<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        factory(App\User::class, 2)->create()->each(function ($user) {
            $user->posts()->saveMany(factory(App\Post::class, 10)->make());
        });
    }
}
