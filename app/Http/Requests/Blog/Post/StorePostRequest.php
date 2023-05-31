<?php

declare(strict_types=1);

namespace App\Http\Requests\Blog\Post;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'category_id' => [
                'required',
                'integer',
            ],
            'user_id' => [
                'required',
                'integer',
            ],
            'title' => [
                'required',
                'string',
            ],
            'except' => [
                'string',
            ],
            'content_raw' => [
                'required',
                'string',
            ],
        ];
    }
}
