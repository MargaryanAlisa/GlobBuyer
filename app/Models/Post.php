<?php

namespace App\Models;

use App\Models\Fragments\Post\Relations;

/**
 * @property string $id
 * @property string $user_id
 * @property string $product_id
 * @property string $product_measured
 * @property string $product_quantity
 * @property string $additional_fee
 */
class Post extends BaseModel
{
    use Relations;

    const PRODUCT_MEASURED = [
        'pieces' => 1,
        'other' => 2,
    ];
    protected $fillable = [
        'user_id',
        'product_id',
        'product_measured',
        'product_quantity',
        'additional_fee',
    ];
}
