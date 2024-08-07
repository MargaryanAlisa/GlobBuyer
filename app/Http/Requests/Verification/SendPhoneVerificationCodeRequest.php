<?php

namespace App\Http\Requests\Verification;

use App\Http\Requests\BaseRequest;

class SendPhoneVerificationCodeRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'phoneNumber' => ['required', 'string'],
        ];
    }
}
