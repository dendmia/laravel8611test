<?php

declare(strict_types=1);

namespace App\Infrastructure\Blog\Category\Repository;

use App\Domain\Blog\Category\Repository\CategoryRepositoryInterface;
use App\Models\BlogCategory;

class CategoryRepository implements CategoryRepositoryInterface
{

    public function find(int $id): BlogCategory|null
    {
        return BlogCategory::findOrFail($id); //TODO: fix auto-completing
    }

    public function store(array $data): BlogCategory
    {
        $model = new BlogCategory();
        $model->parent_id = $data['parent_id'];
        $model->slug = $data['slug'];
        $model->title = $data['title'];
        $model->description = $data['description'];
        $model->saveOrFail();

        return $model;
    }

    public function getAll()
    {
        return BlogCategory::all();
    }
}
