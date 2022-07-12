<?php

namespace App\Listeners;

use App\Events\RegeneratedOtpEvent;
use App\Mail\RegeneratedOtpCodeMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailNotificationRegeneratedOtp implements ShouldQueue
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
     * @param  RegeneratedOtpEvent  $event
     * @return void
     */
    public function handle(RegeneratedOtpEvent $event)
    {
        Mail::to($event->user)->send(new RegeneratedOtpCodeMail($event->user));
    }
}
