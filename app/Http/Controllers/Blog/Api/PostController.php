<?php

declare(strict_types=1);

namespace App\Http\Controllers\Blog\Api;

use App\Application\Blog\Post\Application;
use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\Post\StorePostRequest;
use App\Http\Requests\Blog\Post\UpdatePostRequest;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

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

        return response(status: ResponseAlias::HTTP_CREATED);
    }

    public function update(UpdatePostRequest $request, int $id): Response|\Illuminate\Contracts\Foundation\Application|ResponseFactory
    {
        $data = $request->validated();
$data = $request->all();

        $this->application->updatePost(
            id: $id,
            categoryId: $data['category_id'],
            userId: $data['user_id'],
            title: $data['title'],
            excerpt: $data['excerpt'] ?? null,
            contentRaw: $data['content_raw'],
        );

        return response(status: ResponseAlias::HTTP_NO_CONTENT);
    }
}
