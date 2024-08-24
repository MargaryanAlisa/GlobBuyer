<?php

namespace App\Http\Requests\User\Auth;


use App\Http\Requests\BaseRequest;

class RegisterRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'surname' => ['required', 'string', 'max:100'],
            'phoneNumber' => ['required', 'string', 'unique:users,phone_number'],
            'email' => ['required', 'unique:users', 'email'],
            'password' => ['required', 'string'],
            'passportNumber' => ['sometimes', 'string'],
            'stateProvince' => ['sometimes', 'string'],
            'country' => ['sometimes', 'string'],
            'city' => ['sometimes', 'string'],
            'postalCode' => ['sometimes', 'string'],
            'residenceAddress' => ['sometimes', 'string'],
        ];
    }
}
