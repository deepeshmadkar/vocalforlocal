<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 07-01-2021
 * Time: 12:09 PM
 */

namespace Zapp\Domain\Employee\Actions;


use App\Models\User;
use Zapp\App\Admin\Requests\User\EmployeeRequest;
use Zapp\Domain\Employee\DataTransferObjects\EmployeeData;
use Zapp\Domain\Employee\Models\Employee;
use Zapp\Domain\User\DataTransferObjects\UserData;

use Zapp\Domain\User\States\Admin;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

class SaveEmployeeAction
{
    public function __invoke(User $user): Employee
    {
        $input = [
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phoneno,
            'usertype' => Admin::class,
            'is_admin' => 1,
            'is_active' => 1,
            'user_id' => $user->id
        ];

        $userRequest = new EmployeeRequest($input);
        Validator::make($input, $userRequest->rules())->validate();
        $data = EmployeeData::fromRequest($userRequest);
        $employee = Employee::create($data->toArray());
        $employee->parcel = zparcel($employee->id);
        $employee->update();
        return $employee;
    }

}