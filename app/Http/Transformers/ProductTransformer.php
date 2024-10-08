<?php

namespace App\Http\Transformers;

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
            'attachment' => $item->attachment,
            'description' => $item->description,
        ];
    }
}
