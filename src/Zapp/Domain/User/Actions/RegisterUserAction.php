<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 07-01-2021
 * Time: 12:09 PM
 */

namespace Zapp\Domain\User\Actions;


use App\Models\User;
use Zapp\App\Admin\Requests\User\SaveRequest;
use Zapp\Domain\User\DataTransferObjects\UserData;

use Illuminate\Support\Facades\Validator;

class RegisterUserAction
{
    public function __invoke(array $input): User
    {
        $userRequest = new SaveRequest($input);
        Validator::make($input, $userRequest->rules())->validate();
        $data = UserData::fromRequest($userRequest);
        return (new SaveUserAction)($data );
    }

}