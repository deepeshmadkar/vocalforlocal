<?php

namespace App\Actions\Fortify;

use Zapp\Domain\User\Actions\RegisterUserAction;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        return (new RegisterUserAction)($input);
    }
}
