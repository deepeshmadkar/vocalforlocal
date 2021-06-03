<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 07-01-2021
 * Time: 12:09 PM
 */

namespace Zapp\Domain\User\Actions;


use App\Models\User;
use App\Models\Usermanager;
use Illuminate\Support\Facades\Crypt;

class SaveUsermanagerAction
{
    public function __invoke(User $user): void
    {
        Usermanager::create($this->makePayload($user->id));
    }

    protected function makePayload(int $userId): array
    {
        return [
            'user_id' => $userId,
            'registered_ip' =>  $this->setupRegisteredIp(),
            'device_details' => $this->setupDeviceDetails(),
            'accepted_toc' => $this->setupAcceptedToc(),
            'admin_email_otp' => $this->setupAdminEmailOtp(),
            'email_otp' => $this->setupEmailOtp(),
            'is_active' => $this->setupStatus(),
            'email_verified' => null
        ];
    }

    protected function setupRegisteredIp()
    {
        return null;
    }

    protected function setupDeviceDetails()
    {
        return null;
    }

    protected function setupAcceptedToc()
    {
        return now();
    }

    protected function setupAdminEmailOtp()
    {
        return rand(1111,9999);
    }

    protected function setupEmailOtp()
    {
        return Crypt::encryptString(rand(1111,9999));
    }

    protected function setupStatus()
    {
        return 0;
    }

}