<?php

declare(strict_types=1);

namespace App\Domain\Blog\Post\Repository;

use App\Models\BlogPost;

interface PostRepositoryInterface
{
    public function find(int $int): BlogPost;

    public function store(array $data): int;

    public function getAll();

    public function update($data);
}
