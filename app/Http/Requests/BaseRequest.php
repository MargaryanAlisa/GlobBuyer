<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class BaseRequest extends FormRequest
{
    public function getProcessedData(): array
    {
        return $this->all();
    }
}
