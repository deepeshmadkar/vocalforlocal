<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 08-01-2021
 * Time: 08:51 AM
 */

namespace Zapp\Domain\User\States;


use Zapp\Domain\Employee\Models\Employee;

class Admin extends UserOnboardingState
{

    public function name(): string
    {
        return 'admin';
    }

    public function routes(): string
    {
        return 'admin.dashboard';
    }

    public function details() {
        return Employee::where('user_id', $this->getModel()->id)->get()->first();
    }

}