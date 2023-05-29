<?php

declare(strict_types=1);

namespace App\Http\Controllers\Blog\Api;

use App\Application\Blog\Post\Application;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class PostController extends Controller
{
    public function __construct(private readonly Application $application) {

    }
    public function index(): JsonResponse
    {
        return response()->json($this->application->getAll());
    }
}
