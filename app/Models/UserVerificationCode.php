<?php

namespace App\Models;

/**
 * @property string $email
 * @property string $phone_number
 * @property string $email_verification_code
 * @property string $phone_verification_code
 * @property string $phone_verified
 * @property string $email_verified
 * @property string $status
 * @property string $verification_type
 */
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
    protected $fillable = [
        'email',
        'phone_number',
        'email_verification_code',
        'phone_verification_code',
        'phone_verified',
        'email_verified',
        'status',
        'verification_type',
    ];
}
