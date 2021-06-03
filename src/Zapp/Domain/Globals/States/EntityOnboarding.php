<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 07-01-2021
 * Time: 04:04 PM
 */

namespace Zapp\Domain\Globals\States;

use Spatie\ModelStates\State;
use Spatie\ModelStates\StateConfig;


abstract class EntityOnboarding extends State
{
    public static function config(): StateConfig
    {
        return parent::config()
            ->default(Inprocess::class)
            ->allowTransition(Inprocess::class, Verified::class)
            ->allowTransition(Inprocess::class, Onhold::class)
            ->allowTransition(Inprocess::class, Rejected::class)
            ;
    }

    abstract public function name(): string;
    abstract public function status(): bool;
}