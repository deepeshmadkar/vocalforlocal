<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 08-01-2021
 * Time: 08:51 AM
 */

namespace Zapp\Domain\User\States;


class UnassignedUser extends UserOnboardingState
{
    public function name(): string
    {
        return 'unassigned';
    }

    public function routes(): string
    {
        return 'verify';
    }

    public function details()
    {
        return null;
    }
}