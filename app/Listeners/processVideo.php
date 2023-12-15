<?php

namespace App\Listeners;

use App\Events\VideoCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class processVideo implements shouldQueue
{
    public $queue = 'low';
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(VideoCreated $event): void
    {
        dump($event->video);
        dump('this is Video process');
    }
}
