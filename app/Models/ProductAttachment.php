<?php

namespace App\Models;

/**
 * @property string $id
 * @property string $product_id
 * @property string $name
 * @property string $path
 */
class ProductAttachment extends BaseModel
{
    const PATH = 'product/attachments/';

    protected $fillable = [
        'product_id',
        'name',
        'path',
    ];
    //@TODO add an event for delete attachment from store as well
}
