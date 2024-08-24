<?php

namespace App\Http\Transformers\User;

use App\Http\Transformers\BaseTransformer;
use App\Models\User;
class AuthTransformer extends BaseTransformer
{

    public function simpleTransform($item): array
    {
        /** @var User $item */
        return [
            //
        ];
    }

    public function meTransform(User $user): array
    {
        return UserTransformer::show($user);
    }

    public function loginTransform(User $user): array
    {
        return array_merge(self::me($user),
            ['apiToken' => $user->getAccessToken()]
        );
    }
}
