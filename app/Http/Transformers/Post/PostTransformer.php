<?php

namespace App\Http\Transformers\Post;

use App\Http\Transformers\BaseTransformer;
use App\Http\Transformers\ProductTransformer;
use App\Http\Transformers\User\UserTransformer;
use App\Models\Post;

class PostTransformer extends BaseTransformer
{

    public function simpleTransform($item): array
    {
        /** @var Post $item */
        return [
            'id' => $item->id,
            'product_measured' => $item->product_measured,
            'additional_fee' => $item->additional_fee,
            'product_quantity' => $item->product_quantity,
        ];
    }

    public function showTransform(Post $post): array
    {
        return array_merge($this->simpleTransform($post), [
            'user' => UserTransformer::safe($post->creator),
            'product' => ProductTransformer::safe($post->product),
            'delivery' => DeliveryTransformer::safe($post->delivery)
        ]);
    }
}
