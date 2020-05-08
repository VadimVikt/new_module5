<?php

namespace App\Listeners;

use App\Events\PostDeleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendPostDeleteNotification
{
     /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(PostDeleted $event)
    {
        \Mail::to(config('mail.admin.address'))->send(  //отправка автору - $event->post->owner->email
            new \App\Mail\PostDeleted($event->post)
        );
    }
}
