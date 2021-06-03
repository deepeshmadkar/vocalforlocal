<?php

namespace Zapp\Domain\User\Listners;

use Zapp\Domain\User\Events\UserRegistered;
use Zapp\Domain\User\Mails\NewuserEmailotp;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailOtp
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
     * @param  UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        $newRegisteredUser = $event->user;
        $usermanager = $newRegisteredUser->usermanager;
        Mail::to($newRegisteredUser->email)->send(new NewuserEmailotp($usermanager));
    }
}
