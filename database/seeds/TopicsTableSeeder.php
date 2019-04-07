<?php

use App\Models\User;
use App\Models\Topic;
use App\Models\Category;
use Illuminate\Database\Seeder;

class TopicsTableSeeder extends Seeder
{
    public function run()
    {
        $user_ids = User::all()->pluck('id')->toArray();
        $category_ids = Category::all()->pluck('id')->toArray();

        $topics = factory(Topic::class)->times(50)->make()->each(function ($topic, $index)
            use($user_ids, $category_ids)
        {
            shuffle($user_ids);
            $topic->user_id = reset($user_ids);

            shuffle($category_ids);
            $topic->category_id = reset($category_ids);
        });

        Topic::insert($topics->toArray());
    }

}

