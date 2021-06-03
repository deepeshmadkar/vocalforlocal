<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 07-01-2021
 * Time: 10:56 AM
 */

namespace Zapp\Domain\User\DataTransferObjects;

use Zapp\App\Admin\Requests\User\SaveRequest;
use Zapp\Domain\User\States\UnassignedUser;
use Illuminate\Support\Str;
use Spatie\DataTransferObject\DataTransferObject;
use Illuminate\Support\Facades\Hash;
/*
* Laravel Packages Used.
*/
use Illuminate\Http\Request;

class UserData extends DataTransferObject
{
    public string $name;
    public string $email;
    public string $password;
    public string $phoneno;
    public  $role = UnassignedUser::class;
    public  $parcel = null;
    public  $has_blocked = 0;
    public $has_deleted = 0;
    public $is_active = 0;
    public $social_id = null;
    public $social_type = null;

    public static function fromRequest(SaveRequest $request): self {
        return new self([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'phoneno' => $request->get('phoneno'),
            'role' => $request->get('role'),
            'parcel' => (string) Str::uuid(),
            'has_blocked' => $request->get('has_blocked'),
            'has_deleted' => $request->get('has_deleted'),
            'is_active' => $request->get('is_active'),
            'social_id' => $request->get('social_id'),
            'social_type' => $request->get('social_type'),
        ]);
    }
}