<?php

namespace App\Http\Requests\Post;

use App\Http\Requests\BaseRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class IndexRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return Auth::user()->can('viewAny', Post::class);
    }

    public function rules(): array
    {
        return [
            //
        ];
    }
}
