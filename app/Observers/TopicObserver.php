<?php

namespace App\Observers;

use App\Models\Topic;
use App\Handlers\SlugHandler;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class TopicObserver
{
    public function saving(Topic $topic)
    {
        $topic->body = clean($topic->body, 'topic_body');

        $topic->excerpt = make_excerpt($topic->body);

        if (!$topic->slug) {
            $topic->slug = app(SlugHandler::class)->english($topic->title);
        }
    }

    public function updating(Topic $topic)
    {
        //
    }
}
