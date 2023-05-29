<?php

declare(strict_types=1);

namespace App\Http\Controllers\Blog\Api;

use App\Application\Blog\Category\Application;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;

class CategoryController extends Controller
{
    public function __construct(private readonly Application $application)
    {
    }

    public function index(): Collection|array
    {
        return $this->application->getAll();
    }
}
