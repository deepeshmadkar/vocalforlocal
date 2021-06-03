<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 08-01-2021
 * Time: 08:51 AM
 */

namespace Zapp\Domain\Globals\States;


class Onhold extends EntityOnboarding
{

    public function name(): string
    {
        return 'onhold';
    }

    public function status(): bool
    {
        return false;
    }
}