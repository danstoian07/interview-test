<?php

namespace App\Jobs;

use App\Notifications\ImageWasPublished;
use App\ScheduleContent;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Redis;

class PublishContent implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $content;

    public function __construct(ScheduleContent $content)
    {
        $this->content = $content;
    }

    public function handle()
    {
        Redis::throttle('jobs')->allow(10)->every(1)->then(function () {

            $this->content->publish();

            $this->content->user->notify(new ImageWasPublished($this->content));

        }, function () {
            return $this->release();
        });

    }
}
