<?php

namespace App\Http\Requests\User\Auth;

use App\Http\Requests\BaseRequest;
use Illuminate\Support\Facades\Auth;

class LogoutRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return (bool)$this->user();
    }

    public function rules(): array
    {
        return [
            //
        ];
    }

}
