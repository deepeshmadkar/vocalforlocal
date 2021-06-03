<?php

namespace Zapp\App\Admin\Requests\User;

/*
* Copyright (c) 2020-30 Zivtrix Corporate Services Pvt. Ltd.
* Licence Type: MIT License
*/

use Illuminate\Foundation\Http\FormRequest;
use Laravel\Fortify\Rules\Password;
use Laravel\Jetstream\Jetstream;

class SaveRequest extends FormRequest
{

    public function authorize()
    {
//        return auth()->user()->isAdmin();
        return true;
    }

    
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'phoneno' => ['required', 'string', 'max:15', 'regex:/^[0-9]*$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', new Password, 'confirmed'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ];
    }
}
