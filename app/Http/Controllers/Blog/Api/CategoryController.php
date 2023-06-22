<?php

declare(strict_types=1);

namespace App\Http\Controllers\Blog\Api;

use App\Application\Blog\Category\Application;
use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\Categoty\StoreCategoryRequest;
use App\Models\BlogCategory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class CategoryController extends Controller
{
    public function __construct(private readonly Application $application)
    {
    }

    public function get(int $categoryId): ?BlogCategory
    {
        return $this->application->get($categoryId);
    }

    public function index(): Collection|array
    {
        return $this->application->getAll();
    }

    public function store(StoreCategoryRequest $request): JsonResponse
    {
        $data = $request->validated();

        $category = $this->application->create(
            title: $data['title'],
            description: $data['description'],
            parentId: $data['parent_id'] ?? null,
        );

        return response()->json($category, ResponseAlias::HTTP_CREATED);
    }
}
