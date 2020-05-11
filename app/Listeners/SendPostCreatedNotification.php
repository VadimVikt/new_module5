<?php

namespace App\Listeners;

use App\Events\PostCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendPostCreatedNotification
{
    /**
     * Handle the event.
     *
     * @param  PostCreated  $event
     * @return void
     */
    public function handle(PostCreated $event)
    { //отправка админу
        \Mail::to(config('mail.admin.address'))->send(  //отправка автору - $event->post->owner->email
            new \App\Mail\PostCreated($event->post)
        );
    }
}
