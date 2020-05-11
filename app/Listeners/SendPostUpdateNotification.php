<?php

namespace App\Listeners;

use App\Events\PostUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendPostUpdateNotification
{
    /**
     * Handle the event.
     *
     * @param  PostUpdated  $event
     * @return void
     */
    public function handle(PostUpdated $event)
    {
        \Mail::to(config('mail.admin.address'))->send(  //отправка автору - $event->post->owner->email
            new \App\Mail\PostUpdated($event->post)
        );
    }
}
