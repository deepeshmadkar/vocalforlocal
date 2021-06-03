<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 08-01-2021
 * Time: 08:51 AM
 */

namespace Zapp\Domain\Globals\States;


class Inprocess extends EntityOnboarding
{

    public function name(): string
    {
        return 'inprocess';
    }

    public function status(): bool
    {
        return false;
    }
}