<?php

use Illuminate\Database\Seeder;

class TagToPostSeeder extends Seeder
{
    public function run()
    {
        $tags = App\Tag::pluck('id')->toArray();
        $posts = App\Post::pluck('id')->toArray();

        foreach ($posts as $post) {
            foreach ($tags as $tag) {
                if (!rand(0, 4)) {
                    DB::table('taggables')->insert([
                        'tag_id' => $tag,
                        'taggable_id' => $post,
                        'taggable_type' => \App\Post::class,
                    ]);
                }
            }
        }
    }
}
