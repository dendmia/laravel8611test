<?php

declare(strict_types=1);

namespace App\Infrastructure\Blog\Post\Repository;

use App\Domain\Blog\Post\Repository\PostRepositoryInterface;
use App\Models\BlogPost;
use Illuminate\Database\Eloquent\Collection;

class PostRepository implements PostRepositoryInterface
{

    public function find(int $int): BlogPost
    {
        // TODO: Implement find() method.
    }

    public function store(array $data): void
    {
        $model = new BlogPost();
        $model->category_id = $data['category_id'];
        $model->user_id = $data['user_id'];
        $model->title = $data['title'];
        $model->excerpt = $data['excerpt'];
        $model->content_raw = $data['content_raw'];
        $model->slug = $data['slug'];
        $model->content_html = $data['content_html'];
        $model->saveOrFail();
    }

    public function getAll(): Collection|array
    {
        return BlogPost::all();
    }
}
