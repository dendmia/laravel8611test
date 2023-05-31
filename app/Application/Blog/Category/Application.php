<?php

declare(strict_types=1);

namespace App\Application\Blog\Category;

use App\Domain\Blog\Category\Repository\CategoryRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class Application
{
    public function __construct(
        private readonly CategoryRepositoryInterface $repository,
    ) {
    }

    public function create(string $title, string $description, ?int $parentId): void
    {
        $data = [
            'parent_id' => $parentId ?? 1,
            'slug' => $title . time(), //TODO
            'title' => $title,
            'description' => $description,
        ];

        $this->repository->store($data);
    }

    public function getAll(): Collection|array
    {
        return $this->repository->getAll();
    }
}
