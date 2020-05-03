<?php

use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    public function run()
    {
        factory(App\Tag::class, 5)->create();
    }
}
