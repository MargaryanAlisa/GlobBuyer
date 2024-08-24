<?php

namespace App\Models;

/**
 * @property string $user_id
 * @property string $verification_attachment
 * @property string $passport_number
 * @property string $status
 */
class UserIdentityVerification extends BaseModel
{
    const IDENTITY_STATUS = [
        'pending' => 1,
        'verified' => 2,
        'failed' => 3,
    ];

    protected $fillable = [
        'user_id',
        'verification_attachment',
        'passport_number',
        'status',
    ];
}
