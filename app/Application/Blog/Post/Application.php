<?php

declare(strict_types=1);

namespace App\Application\Blog\Post;

use App\Domain\Blog\Post\Repository\PostRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class Application
{
    public function __construct(
        private readonly PostRepositoryInterface $repository
    ) {
    }

    public function getAll(): Collection|array
    {
        return $this->repository->getAll();
    }

    public function createPost(
        int     $categoryId,
        int     $userId,
        string  $title,
        ?string $excerpt,
        string  $contentRaw,
    ): void
    {
        $data = [
            'category_id' => $categoryId,
            'user_id' => $userId,
            'slug' => $title . time(), //TODO
            'title' => $title,
            'excerpt' => $excerpt ?? null,
            'content_raw' => $contentRaw,
            'content_html' => '<text> ' . $contentRaw . ' </text>'
        ];

        $this->repository->store($data);
    }
}
