<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 07-01-2021
 * Time: 12:09 PM
 */

namespace Zapp\Domain\User\Actions;


use App\Models\User;
use Zapp\App\Admin\Requests\User\OtpRequest;
use Zapp\Domain\User\DataTransferObjects\UsermanagerData;
use Illuminate\Support\Facades\Validator;

class HandleUserOtpAction
{
    public function __invoke(array $input)
    {

        $otpRequest = new OtpRequest($input);
        Validator::make($input, $otpRequest->rules())->validate();
        $data = UsermanagerData::fromRequest($otpRequest);
        $usermanager =  auth()->user()->usermanager->update($data->only('email_verified')->toArray());
        if(!$usermanager) return false;
        auth()->user()->update(['is_active' => 1]);
        return true;
    }

}