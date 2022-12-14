<?php

namespace App\Listeners;

use App\Events\userRegisteredEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserRegisteredMail;

class SendEmailNotificationRegistered implements ShouldQueue
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
     * @param  userRegisteredEvent  $event
     * @return void
     */
    public function handle(userRegisteredEvent $event)
    {
        Mail::to($event->user)->send(new UserRegisteredMail($event->user));
    }
}
