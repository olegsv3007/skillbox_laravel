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
        }

        foreach ($tagsToDetach as $tag) {
            $this->tags()->detach($tag);
        }
    }
}
