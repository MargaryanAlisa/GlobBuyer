<?php

namespace App\Models\Fragments\User;


use App\Models\Post;
use App\Models\UserAddress;
use App\Models\UserIdentityVerification;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

trait Relations
{
    public function address(): HasOne
    {
       return $this->hasOne(UserAddress::class);
    }

    public function identityVerification(): HasOne
    {
        return $this->hasOne(UserIdentityVerification::class);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
