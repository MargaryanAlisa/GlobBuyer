<?php

namespace App\Http\Transformers\Product;

use App\Http\Transformers\BaseTransformer;
use App\Models\Product;

class ProductTransformer extends BaseTransformer
{
    public function simpleTransform($item): array
    {
        /** @var Product $item */
        return [
            'id' => $item->id,
            'name' => $item->name,
            'price' => $item->price,
            'info' => $item->info,
            'attachments' => ProductAttachmentTransformer::collection($item->attachments),
            'description' => $item->description,
        ];
    }

    /**
     * @OA\Schema (
     *   schema="ProductIndex",
     *   type="object",
     *
     *   @OA\Property(property="id", type="string"),
     *   @OA\Property(property="name", type="string"),
     *   @OA\Property(property="price", type="string"),
     *   @OA\Property(property="description", type="string"),
     *
     * )
     */
    public function indexTransform(Product $product): array
    {
        return [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'description' => $product->description,
        ];
    }
}
