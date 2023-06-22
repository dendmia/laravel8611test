<?php

declare(strict_types=1);

namespace App\Infrastructure\Blog\Post\Repository;

use App\Domain\Blog\Post\Repository\PostRepositoryInterface;
use App\Models\BlogPost;
use Illuminate\Database\Eloquent\Collection;

class PostRepository implements PostRepositoryInterface
{

    public function find(int $int): ?BlogPost
    {
        return BlogPost::findOrFail($int);
    }

    public function store(array $data): BlogPost
    {
        $post = new BlogPost();
        $post->category_id = $data['category_id'];
        $post->user_id = $data['user_id'];
        $post->title = $data['title'];
        $post->excerpt = $data['excerpt'];
        $post->content_raw = $data['content_raw'];
        $post->slug = $data['slug'];
        $post->content_html = $data['content_html'];
        $post->saveOrFail();

        return $post;
    }

    public function getAll(): Collection|array
    {
        return BlogPost::all();
    }

    public function update($data): void
    {
        $post = $this->find($data['id']);
        $post->category_id = $data['category_id'];
        $post->user_id = $data['user_id'];
        $post->title = $data['title'];
        $post->excerpt = $data['excerpt'];
        $post->content_raw = $data['content_raw'];
        $post->slug = $data['slug'];
        $post->content_html = $data['content_html'];
        $post->saveOrFail();
    }
}
