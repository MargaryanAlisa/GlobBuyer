<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id
 * @property string $product_id
 * @property string $name
 * @property string $url
 */
class ProductAttachment extends Model
{
    protected $fillable = [
        'product_id',
        'name',
        'url',
    ];
}
