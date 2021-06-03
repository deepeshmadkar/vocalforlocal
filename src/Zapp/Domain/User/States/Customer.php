<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 08-01-2021
 * Time: 08:51 AM
 */

namespace Zapp\Domain\User\States;


use Zapp\Domain\User\States\Customer;
use Zapp\Domain\Employee\Models\Employee;

class Customer extends UserOnboardingState
{

    public function name(): string
    {
        return 'customer';
    }

    public function routes(): string
    {
        return 'my.dashboard';
    }

    public function details() {
        return Customer::where('user_id', $this->getModel()->id)->get()->first();
    }

}