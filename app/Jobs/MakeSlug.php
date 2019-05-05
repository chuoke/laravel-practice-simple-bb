<?php

namespace App\Jobs;

use App\Models\Topic;
use App\Handlers\SlugHandler;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class MakeSlug implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $topic;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Topic $topic)
    {
        $this->topic = $topic;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $slug = App(SlugHandler::class)->english($this->topic->title);

        \DB::table($this->topic->getTable())
            ->where('id', $this->topic->id)
            ->update(['slug' => $slug]);
    }
}
