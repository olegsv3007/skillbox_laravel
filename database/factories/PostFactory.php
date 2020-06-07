<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'name' => $faker->words(4, true),
        'slug' => $faker->unique()->slug,
        'announce' => $faker->sentence,
        'body' => $faker->realText(2000),
        'published' => true,
        'owner_id' => factory(\App\User::class),
    ];
});
