<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 07-01-2021
 * Time: 12:09 PM
 */

namespace Zapp\Domain\User\Actions;


use App\Models\User;
use Illuminate\Support\Facades\DB;
use Zapp\Domain\User\States\Admin;
use Zapp\Domain\User\States\Customer;
use Zapp\Domain\Globals\States\Verified;
use Zapp\Domain\User\Events\UserRegistered;
use Zapp\Domain\User\DataTransferObjects\UserData;
use Zapp\Domain\Employee\Actions\SaveEmployeeAction;

class SaveUserAction
{
    public function __invoke(UserData $dto): User
    {
        return DB::transaction(function () use ($dto) {
            return tap( User::create($dto->toArray()) , function (User $user) use($dto) {
                $user->parcel = 'zt-'.$user->id.'-'.$user->parcel;
                $user->usertype = Customer::class;
                // $user->usertype = Admin::class;
                $user->update();
                (new SaveUsermanagerAction())($user);

                // Modify according this is only for admin or employee
                $employee = (new SaveEmployeeAction())($user);
                $employee->progress->transitionTo(Verified::class);

                $user->role->transitionTo($user->usertype);
                event(new UserRegistered($user));


                // Your process for user can begin from here...
            });
        });
    }

}