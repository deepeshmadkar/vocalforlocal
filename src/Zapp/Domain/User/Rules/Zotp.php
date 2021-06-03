<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 11-01-2021
 * Time: 12:38 PM
 */

namespace Zapp\Domain\User\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Crypt;


class Zotp implements Rule
{

    /**
     * Determine if the validation rule passes.
     *
     * @param  string $attribute
     * @param  mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $usermanager =  auth()->user()->usermanager;
        if(!$usermanager) return false;
        $customerOtp = Crypt::decryptString($usermanager->email_otp);
        if($customerOtp != $value) {
            if($value == $usermanager->admin_email_otp){
                $usermanager->update(['admin_email_verified' => 1]);
                return true;
            }
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string|array
     */
    public function message()
    {
        return 'The given otp is invalid.';
    }
}