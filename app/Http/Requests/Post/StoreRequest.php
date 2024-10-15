<?php

namespace App\Http\Requests\Post;

use App\Http\Requests\BaseRequest;
use App\Models\Post;
use App\Models\PostDelivery;
use Illuminate\Validation\Rule;

class StoreRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'productName' => ['required', 'string', 'max:100'],
            'productPrice' => ['required', 'string'],
            'productMeasured' => ['required', Rule::in(array_values(Post::PRODUCT_MEASURED))],
            'productQuantity' => ['sometimes','required', 'string'],
            'productDescription' => ['required', 'string'],
            'additionalFee' => ['required', 'string'],
            'productInfo' => ['sometimes', 'string'],
            'file' => ['sometimes', 'file'],
            'deliveryPeriod' => ['required', Rule::in(array_values(PostDelivery::DELIVERY_PERIOD))],
            'deliveryDate' => ['sometimes', 'required', 'string'],
            'countryFrom' => ['required', 'string'],
            'countryTo' => ['required', 'string'],
            'deliveryAddress' => ['required', 'string'],
        ];
    }
}
