<?php

namespace App\Models\Fragments\User;

trait Getters
{
    public function getAccessToken()
    {
        return $this->currentAccessToken();
    }
}
