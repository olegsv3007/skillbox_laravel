<?php

namespace App;

trait Taggable
{
    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable');
    }

    public function syncTags($tags)
    {
        $currentTags = $this->tags->keyBy('name');
        $tags = collect(explode('|', $tags))->keyBy(function($item) { return $item; });

        $tagsToAttach = $tags->diffKeys($currentTags);
        $tagsToDetach = $currentTags->diffKeys($tags);

        foreach ($tagsToAttach as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);
            $this->tags()->attach($tag);
            \Cache::tags('news_for_tag')->forget('news_for_tag_' . $tag->name);
            \Cache::tags('posts_for_tag')->forget('posts_for_tag_' . $tag->name);
        }

        foreach ($tagsToDetach as $tag) {
            $this->tags()->detach($tag);
            \Cache::tags('news_for_tag')->forget('news_for_tag_' . $tag->name);
            \Cache::tags('posts_for_tag')->forget('posts_for_tag_' . $tag->name);
        }

        if ($tagsToAttach->isNotEmpty() || $tagsToDetach->isNotEmpty()) {
            \Cache::forget('tagsCloud');
            \Cache::forget('posts');
        }
    }
}
