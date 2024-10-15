<?php

namespace App\Http\Persisters\Post;

use App\Http\Persisters\BasePersister;
use App\Models\Post;
use App\Models\Product;
use App\Models\ProductAttachment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class StorePersister extends BasePersister
{
    private Product $product;
    private Post $post;
    protected function executePersist(): void
    {
        $this->createProduct();
        $this->createPost();
        $this->createPostDelivery();
    }

    private function createProduct(): void
    {
        $this->product = Product::create([
            'name' => $this->data->get('productName'),
            'price' => $this->data->get('productPrice'),
            'description' => $this->data->get('productDescription'),
            'info' => $this->data->get('productInfo'),
        ]);

        $this->createAttachment();
    }

    private function createAttachment(): void
    {
        if ($file = $this->data->get('file')) {
            $attachment =  $this->product->attachments()->create([
                'path' => Str::uuid()->toString().'.'.$file->getClientOriginalExtension(),
                'name' => $file->getClientOriginalName(),
            ]);
            $file->storeAs(ProductAttachment::PATH, $attachment->path);
        }
    }
    private function createPost(): void
    {
        $this->post = Auth::user()->posts()->create([
            'product_id' => $this->product->id,
            'product_measured' => $this->data->get('productMeasured'),
            'additional_fee' => $this->data->get('additionalFee'),
            'product_quantity' => $this->data->get('productQuantity'),
        ]);
    }
    private function createPostDelivery(): void
    {
        $this->post->delivery()->create([
            'delivery_period' => $this->data->get('deliveryPeriod'),
            'delivery_date' => $this->data->get('deliveryDate'),
            'delivery_address' => $this->data->get('deliveryAddress'),
            'country_from' => $this->data->get('countryFrom'),
            'country_to' => $this->data->get('countryTo'),
        ]);
    }

    public function getPost()
    {
        return $this->post->load(['product.attachments', 'delivery', 'creator'])->fresh();
    }
}
