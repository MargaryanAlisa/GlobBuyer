<?php

namespace App\Models;

/**
 * @property string $id
 * @property string $post_id
 * @property string $delivery_period
 * @property string $delivery_date
 * @property string $delivery_address
 * @property string $country_from
 * @property string $country_to
 */
class PostDelivery extends BaseModel
{
    const DELIVERY_PERIOD = [
        'specific_time' => 1,
        'soon_as_possible' => 2,
        'not_important' => 3,
    ];

    protected $fillable = [
        'post_id',
        'delivery_period',
        'delivery_date',
        'delivery_address',
        'country_from',
        'country_to',
    ];
}
