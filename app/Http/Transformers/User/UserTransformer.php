<?php

namespace App\Http\Transformers\User;


use App\Http\Transformers\BaseTransformer;
use App\Models\User;

class UserTransformer extends BaseTransformer
{
    /**
     * @OA\Schema (
     *   schema="UserSimple",
     *   type="object",
     *
     *   @OA\Property(property="id", type="string"),
     *   @OA\Property(property="name", type="string"),
     *   @OA\Property(property="surname", type="string"),
     *   @OA\Property(property="email", type="string"),
     *   @OA\Property(property="phoneNumber", type="string"),
     *
     * )
     */
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
