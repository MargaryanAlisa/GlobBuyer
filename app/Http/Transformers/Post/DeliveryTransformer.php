<?php

namespace App\Http\Transformers\Post;

use App\Http\Transformers\BaseTransformer;
use App\Models\PostDelivery;

class DeliveryTransformer extends BaseTransformer
{

    public function simpleTransform($item): array
    {
        /** @var PostDelivery $item */
        return [
            'id' => $item->id,
            'delivery_period' => $item->delivery_period,
            'delivery_address' => $item->delivery_address,
            'delivery_date' => $item->delivery_date,
            'country_from' => $item->country_from,
            'country_to' => $item->country_to,
        ];
    }
}
