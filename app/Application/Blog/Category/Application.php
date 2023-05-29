<?php

declare(strict_types=1);

namespace App\Application\Blog\Category;

use App\Models\BlogCategory;
use Illuminate\Database\Eloquent\Collection;

class Application
{

    public function create(string $title, string $description, ?int $parentId): void
    {
        $model = new BlogCategory();
        $model->parent_id = $parentId ?? 1;
        $model->slug = $title . time(); //TODO
        $model->title = $title;
        $model->description = $description;
        $model->save();
    }

    public function getAll(): Collection|array
    {
        return BlogCategory::all();
    }
}
