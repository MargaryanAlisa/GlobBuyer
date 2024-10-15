<?php

namespace App\Models\Fragments\Product;

use App\Models\ProductAttachment;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait Relations
{
    public function attachments(): HasMany
    {
        return $this->hasMany(ProductAttachment::class);
    }
}
