<?php

namespace App\Http\Transformers\User;

use App\Http\Transformers\BaseTransformer;
use App\Models\UserAddress;

class UserAddressTransformer extends BaseTransformer
{
    public function simpleTransform($item): array
    {
        /** @var UserAddress $item */
        return [
            'user_id' => $item->user_id,
            'country' => $item->country,
            'city' => $item->city,
            'stateProvince' => $item->state_province,
            'postalCode' => $item->postal_code,
            'residenceAddress' => $item->residence_address,
        ];
    }
}
