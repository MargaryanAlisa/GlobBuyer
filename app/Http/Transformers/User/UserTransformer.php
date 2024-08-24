<?php

namespace App\Http\Transformers\User;


use App\Http\Transformers\BaseTransformer;
use App\Models\User;

class UserTransformer extends BaseTransformer
{
    public function simpleTransform($item): array
    {
        /** @var User $item */
        return [
            'id' => $item->id,
            'name' => $item->name,
            'surname' => $item->lastname,
            'email' => $item->email,
            'phoneNumber' => $item->phone_number,
        ];
    }

    public function showTransform(User $user): array
    {
        return array_merge(self::simple($user),
            ['address' => UserAddressTransformer::safe($user->address) ?? []]
        );
    }
}
