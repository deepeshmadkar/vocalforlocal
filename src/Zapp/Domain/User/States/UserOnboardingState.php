<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 07-01-2021
 * Time: 04:04 PM
 */

namespace Zapp\Domain\User\States;

use Spatie\ModelStates\State;
use Spatie\ModelStates\StateConfig;


abstract class UserOnboardingState extends State
{
    public static function config(): StateConfig
    {
        return parent::config()
            ->default(UnassignedUser::class)
            ->allowTransition(UnassignedUser::class, Admin::class)
            ->allowTransition(UnassignedUser::class, Customer::class)

            ;
    }

    abstract public function name(): string;
    abstract public function routes(): string;
    abstract public function details();
}