<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Notifications\Notifiable;

/**
 * @property string $name
 * @property string $lastname
 * @property string $email
 * @property string $phone_number
 * @property string $password
 * @property string $profile_attachment
 * @property integer $role
 */
class User extends BaseModel implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, MustVerifyEmail,
    HasFactory, Notifiable;

    const ROLES = [
        'admin' => 1,
        'user' => 2
    ];

    protected $fillable = [
        'name',
        'lastname',
        'email',
        'role',
        'phone_number',
        'password',
        'profile_attachment',
    ];
}
