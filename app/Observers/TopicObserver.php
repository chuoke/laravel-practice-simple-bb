<?php

namespace App\Observers;

use App\Models\Topic;
use App\Jobs\MakeSlug;
use App\Handlers\SlugHandler;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class TopicObserver
{
    public function saving(Topic $topic)
    {
        $topic->body = clean($topic->body, 'topic_body');

        $topic->excerpt = make_excerpt($topic->body);
    }
    
    public function saved(Topic $topic)
    {
        if (!$topic->slug) {
            dispatch(new MakeSlug($topic));
        }
    }

    public function updating(Topic $topic)
    {
        //
    }
}
