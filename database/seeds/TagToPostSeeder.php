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
                    DB::table('tag_post')->insert([
                        'tag_id' => $tag,
                        'post_id' => $post,
                    ]);
                }
            }
        }
    }
}
