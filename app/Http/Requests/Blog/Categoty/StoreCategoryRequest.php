<?php

declare(strict_types=1);

namespace App\Http\Requests\Blog\Categoty;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'parent_id' => [
                'integer',
            ],
            'title' => [
                'required',
                'string',
            ],
            'description' => [
                'required',
                'string',
            ]
        ];
    }
}
