<?php

namespace App\Models;

class UserVerificationCode
{
    const VERIFICATION_TYPES = [
        'registration' => 1,
        'forgot_password' => 2,
    ];

    const VERIFICATION_CODE_STATUSES = [
        'pending' => 1,
        'verified' => 2,
    ];
}
