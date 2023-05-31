<?php

declare(strict_types=1);

namespace App\Domain\Blog\Category\Repository;

use App\Models\BlogCategory;

interface CategoryRepositoryInterface
{
    public function find(int $id): BlogCategory;

    public function store(array $data);

    public function getAll();
}
