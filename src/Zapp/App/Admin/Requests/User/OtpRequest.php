<?php

namespace Zapp\App\Admin\Requests\User;

/*
* Copyright (c) 2020-30 Zivtrix Corporate Services Pvt. Ltd.
* Licence Type: MIT License
*/

use Zapp\Domain\User\Rules\Zotp;
use Illuminate\Foundation\Http\FormRequest;

class OtpRequest extends FormRequest
{

    public function authorize()
    {
        return auth()->user();
    }

    
    public function rules()
    {
        return [
            'email_otp' => ['required', 'numeric', 'max:9999', 'min:0001', new Zotp()],
        ];
    }
}
