<?php

namespace App\Models;

/**
 * @property string $id
 * @property string $name
 * @property string $price
 * @property string $description
 * @property string $info
 * @property string $attachment
 */
class Product extends BaseModel
{
    protected $fillable = [
        'name',
        'price',
        'description',
        'info',
        'attachment',
    ];
}
