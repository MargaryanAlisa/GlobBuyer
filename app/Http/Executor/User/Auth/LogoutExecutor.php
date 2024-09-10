<?php

namespace App\Http\Executor\User\Auth;

use App\Http\Executor\BaseExecutor;
use Illuminate\Support\Facades\Auth;

class LogoutExecutor extends BaseExecutor
{
    protected function executeAction(): void
    {
        Auth::user()->tokens()->delete();
    }

    public function getResponseMessage(): array
    {
        return [
            'User has been logged out of the account'
        ];
    }
}
