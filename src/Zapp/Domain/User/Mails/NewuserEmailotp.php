<?php

namespace Zapp\Domain\User\Mails;

use App\Models\Usermanager;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Crypt;


class NewuserEmailotp extends Mailable
{
    use Queueable, SerializesModels;

    protected $usermanager;

    public function __construct(Usermanager $usermanager)
    {
        $this->usermanager = $usermanager;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->markdown('emails.users.emailotp')
                    ->with([
                        'username' => $this->usermanager->user->name,
                        'email_otp' => Crypt::decryptString($this->usermanager->email_otp)
                    ]);
    }
}
