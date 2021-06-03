<?php

namespace Zapp\App\Admin\Requests\User;

/*
* Copyright (c) 2020-30 Zivtrix Corporate Services Pvt. Ltd.
* Licence Type: MIT License
*/

use Illuminate\Foundation\Http\FormRequest;
use Laravel\Fortify\Rules\Password;
use Laravel\Jetstream\Jetstream;

class EmployeeRequest extends FormRequest
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
            'phone' => ['required', 'string', 'max:15', 'regex:/^[0-9]*$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'exists:users', 'unique:employees'],
            'address' => ['sometimes'],
            'education' => ['sometimes'],
            'designation' => ['sometimes'],
            'joining_date' => ['sometimes'],
            'leaving_date' => ['sometimes'],
            'leaving_reason' => ['sometimes'],
            'data' => ['sometimes'],
            'is_admin' => ['sometimes'],
            'progress' => ['sometimes'],
            'user_id' => ['required'],
            'is_active' => ['sometimes'],
            'parcel' => ['sometimes'],
            'has_deleted' => ['sometimes'],
            'has_blocked' => ['sometimes'],
        ];
    }
}
