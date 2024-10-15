<?php

namespace App\Http\Transformers\Product;

use App\Http\Transformers\BaseTransformer;
use App\Models\ProductAttachment;

class ProductAttachmentTransformer extends BaseTransformer
{
    public function simpleTransform($item): array
    {
        /** @var ProductAttachment $item */
        return [
            'id' => $item->id,
            'path' => $item->path,
            'name' => $item->name,
        ];
    }
}
