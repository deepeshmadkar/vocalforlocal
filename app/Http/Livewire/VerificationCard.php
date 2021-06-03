<?php

namespace App\Http\Livewire;

use Zapp\Domain\User\Actions\HandleUserOtpAction;
use Livewire\Component;
use Zapp\Domain\User\Events\UserRegistered;

class VerificationCard extends Component
{
    public $email_otp;
    public $verificationEmailed = false;

    public function zverifyNow()
    {
        $verify = (new HandleUserOtpAction)(['email_otp' => $this->email_otp]);

        if(!$verify){
            $this->addError('email_otp', 'The given otp is invalid.');
        }

        return redirect()->route('dashboard');
    }

    public function resendVerification()
    {
        if(!$this->verificationEmailed){
            event(new UserRegistered(auth()->user()));
            $this->verificationEmailed = true;
        }
    }

    public function removeVerification()
    {
        $this->verificationEmailed = false;
    }





    public function render()
    {
        return view('livewire.verification-card');
    }
}
