<?php

namespace App\Models\Fragments\User;

trait Mutators
{
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
