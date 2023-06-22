<?php

declare(strict_types=1);

namespace App\Http\Requests\Blog\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'category_id' => [
                'integer',
            ],
            'user_id' => [
                'integer',
            ],
            'title' => [
                'string',
            ],
            'except' => [
            ],
            'content_raw' => [
                'string',
            ],
        ];
    }
}
