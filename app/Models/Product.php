<?php

namespace App\Models;

use App\Models\Fragments\Product\Relations;

/**
 * @property string $id
 * @property string $name
 * @property string $price
 * @property string $description
 * @property string $info
 */
class Product extends BaseModel
{
    use Relations;

    protected $fillable = [
        'name',
        'price',
        'description',
        'info',
    ];
}
