<?php

namespace App\Models;

class UserIdentityVerification
{
    const IDENTITY_STATUS = [
        'pending' => 1,
        'verified' => 2,
        'failed' => 3,
    ];
}
