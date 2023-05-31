<?php

declare(strict_types=1);

namespace App\Application\Blog\Post;

use App\Models\BlogPost;
use Illuminate\Database\Eloquent\Collection;

class Application
{

    public function getAll(): Collection|array
    {
        return BlogPost::all();
    }

    public function createPost(
        int     $categoryId,
        int     $userId,
        string  $title,
        ?string $excerpt,
        string  $contentRaw,
    ): void
    {
        $model = new BlogPost();
        $model->category_id = $categoryId;
        $model->user_id = $userId;
        $model->title = $title;
        $model->excerpt = $excerpt ?? null;
        $model->content_raw = $contentRaw;

        $model->slug = $title . time(); //TODO
        $model->content_html = '<text>' . $contentRaw . '</text>';
        $model->save();
    }
}
