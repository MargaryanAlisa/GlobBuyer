<?php

namespace App\Models;

use App\Models\Fragments\User\Getters;
use App\Models\Fragments\User\Mutators;
use App\Models\Fragments\User\Relations;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

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
    HasFactory, Notifiable, HasApiTokens, Mutators, Relations, Getters;

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
