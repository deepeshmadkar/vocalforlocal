<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 07-01-2021
 * Time: 10:56 AM
 */

namespace Zapp\Domain\Employee\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;
use Zapp\App\Admin\Requests\User\EmployeeRequest;


class CustomerData extends DataTransferObject
{
    public $name = null;
    public $email = null;
    public $phone= null;
    public $address = null;
    public $data = null;
    public $is_admin = null;
    public $usertype = null;
    public $state = null;
    public $progress = null;
    public $user_id = null;
    public $is_active = null;
    public $parcel = null;
    public $has_deleted = 0;
    public $has_blocked = 0;

    public static function fromRequest(EmployeeRequest $request): self {
        return new self([
            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'address' => $request->get('address'),
            'data' => $request->get('data'),
            'is_admin' => $request->get('is_admin'),
            'user_id' => $request->get('user_id'),
            'progress' => $request->get('progress'),
            'is_active' => $request->get('is_active'),
            'parcel' => $request->get('parcel'),
            'has_deleted' => $request->get('has_deleted'),
            'has_blocked' => $request->get('has_blocked'),
        ]);
    }


}