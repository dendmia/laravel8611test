<?php

declare(strict_types=1);

namespace App\Http\Controllers\Blog\Api;

use App\Application\Blog\Post\Application;
use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\Post\StorePostRequest;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class PostController extends Controller
{
    public function __construct(private readonly Application $application) {

    }
    public function index(): JsonResponse
    {
        return response()->json($this->application->getAll());
    }

    public function store(StorePostRequest $request): ResponseFactory|\Illuminate\Contracts\Foundation\Application|Response
    {
        $data = $request->validated();

        $this->application->createPost(
            categoryId: $data['category_id'],
            userId: $data['user_id'],
            title: $data['title'],
            excerpt: $data['excerpt'] ?? null,
            contentRaw: $data['content_raw'],
        );

        return response(status: 201);
    }
}
