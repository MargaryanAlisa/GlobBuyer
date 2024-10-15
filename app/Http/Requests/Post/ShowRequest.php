<?php

namespace App\Http\Requests\Post;

use App\Http\Requests\BaseRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

/**
 * @property Post $post
 */
class ShowRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return Auth::user()->can('view', $this->post);
    }

    public function rules(): array
    {
        return [
           //
        ];
    }
}
