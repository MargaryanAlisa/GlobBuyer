<?php

namespace App\Models;

/**
 * @property string $user_id
 * @property string $country
 * @property string $city
 * @property string $state_province
 * @property string $postal_code
 * @property string $residence_address
 */
class UserAddress extends BaseModel
{
    protected $table = 'users_addresses';
    protected $fillable = [
        'user_id',
        'country',
        'city',
        'state_province',
        'postal_code',
        'residence_address',
    ];
}
