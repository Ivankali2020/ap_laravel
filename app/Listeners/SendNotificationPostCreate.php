<?php

namespace App\Listeners;

use App\Mail\StoreTaskMail;
use App\Events\PostCreateEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Notifications\PostCreateNoti;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class SendNotificationPostCreate
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PostCreateEvent  $event
     * @return void
     */
    public function handle(PostCreateEvent $event)
    {       
        // dd($event->post) ;
        // Mail::to(Auth::user())->send(new StoreTaskMail($event->post));

        Notification::send(Auth::user(),new PostCreateNoti($event));

    }

    public function failed(PostCreateEvent $event,$exception)
    {
        dd($exception);
    }
}
