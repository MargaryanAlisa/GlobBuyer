<?php

namespace App\Http\Requests\User\Auth;

use App\Http\Requests\BaseRequest;

class LoginRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'exists:users,email', 'email'],
            'password' => ['required', 'string'], // @TODO need to set password validation
        ];
    }
}
