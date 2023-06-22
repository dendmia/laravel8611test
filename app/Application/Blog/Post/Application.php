<?php

declare(strict_types=1);

namespace App\Application\Blog\Post;

use App\Domain\Blog\Post\Repository\PostRepositoryInterface;
use App\Models\BlogPost;
use Exception;
use Illuminate\Database\Eloquent\Collection;

class Application
{
    public function __construct(
        private readonly PostRepositoryInterface $repository
    ) {
    }

    public function get(int $postId): ?BlogPost
    {
        return $this->repository->find($postId);
    }

    public function getAll(): Collection|array
    {
        return $this->repository->getAll();
    }

    /**
     * @throws Exception
     */
    public function createPost(
        int     $categoryId,
        int     $userId,
        string  $title,
        ?string $excerpt,
        string  $contentRaw,
    ): BlogPost
    {
        $data = [
            'category_id' => $categoryId,
            'user_id' => $userId,
            'slug' => $title . random_int(1000, 9999), //TODO
            'title' => $title,
            'excerpt' => $excerpt ?? null,
            'content_raw' => $contentRaw,
            'content_html' => '<text> ' . $contentRaw . ' </text>'
        ];

        return $this->repository->store($data);
    }

    /**
     * @throws Exception
     */
    public function updatePost(
        int     $id,
        int     $categoryId,
        int     $userId,
        string  $title,
        ?string $excerpt,
        string  $contentRaw,
    ): void
    {
        $data = [
            'id' => $id,
            'category_id' => $categoryId,
            'user_id' => $userId,
            'slug' => $title . random_int(1000, 9999), //TODO
            'title' => $title,
            'excerpt' => $excerpt,
            'content_raw' => $contentRaw,
            'content_html' => '<text> ' . $contentRaw . ' </text>'
        ];

        $this->repository->update($data);
    }
}
