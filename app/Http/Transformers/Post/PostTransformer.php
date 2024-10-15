<?php

namespace App\Http\Transformers\Post;

use App\Http\Transformers\BaseTransformer;
use App\Http\Transformers\Product\ProductTransformer;
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
            'status' => $item->status,
            'visibility' => $item->visibility,
        ];
    }

    public function showTransform(Post $post): array
    {
        return array_merge($this->simpleTransform($post), [
            'creator' => UserTransformer::safe($post->creator),
            'product' => ProductTransformer::safe($post->product),
            'delivery' => DeliveryTransformer::safe($post->delivery)
        ]);
    }

    /**
     * @OA\Schema (
     *   schema="PostIndex",
     *   type="object",
     *
     *   @OA\Property(property="creator", type="array", @OA\Items(ref="#/components/schemas/UserSimple")),
     *   @OA\Property(property="product", type="array", @OA\Items(ref="#/components/schemas/ProductIndex")),
     *   @OA\Property(property="delivery", type="array", @OA\Items(ref="#/components/schemas/DeliveryIndex")),
     *
     * )
     */
    public function indexTransform(Post $post): array
    {
        return [
            'creator' => UserTransformer::safe($post->creator),
            'product' => ProductTransformer::safe($post->product, 'indexTransform'),
            'delivery' => DeliveryTransformer::safe($post->delivery, 'indexTransform')
        ];
    }
}
