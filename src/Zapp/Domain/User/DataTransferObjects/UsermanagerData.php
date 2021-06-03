<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 07-01-2021
 * Time: 10:56 AM
 */

namespace Zapp\Domain\User\DataTransferObjects;

use Zapp\App\Admin\Requests\User\OtpRequest;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use Spatie\DataTransferObject\DataTransferObject;
use Illuminate\Support\Facades\Hash;


class UsermanagerData extends DataTransferObject
{
    public $registered_ip = null;
    public $device_details = null;
    public $accepted_toc = null;
    public $admin_email_otp = null;
    public $email_otp = null;
    public $admin_email_verified = null;
    public $email_verified = null;
    public $admin_sms_otp = null;
    public $sms_otp = null;
    public $admin_sms_verified = null;
    public $sms_verified = null;
    public $user_id = null;

    public static function fromRequest(OtpRequest $request): self {
        return new self([
            'registered_ip' => $request->get('registered_ip'),
            'device_details' => $request->get('device_details'),
            'accepted_toc' => $request->get('accepted_toc'),
            'admin_email_otp' => $request->get('admin_email_otp'),
            'email_otp' => $request->get('email_otp') ?? self::setupEmailOtp(),
            'admin_email_verified' => $request->get('admin_email_verified'),
            'email_verified' => $request->get('email_verified') ?? now(),
            'admin_sms_otp' => $request->get('admin_sms_otp'),
            'sms_otp' => $request->get('sms_otp'),
            'admin_sms_verified' => $request->get('admin_sms_verified'),
            'sms_verified' => $request->get('sms_verified'),
            'user_id' => $request->get('user_id'),
        ]);
    }

    protected static function setupEmailOtp()
    {
        return Crypt::encryptString(rand(1111,9999));
    }
}