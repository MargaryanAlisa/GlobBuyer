<?php

namespace App\Http\DataProviders\Post;

use App\Http\DataProviders\BaseDataProvider;
use App\Models\Post;

class IndexDataProvider extends BaseDataProvider
{
    public function __construct()
    {
        //@TODO need to be add filter and handle request
        $this->setBuilder();
    }

    protected function setBuilder()
    {
        $this->builder = Post::query();
    }
}
