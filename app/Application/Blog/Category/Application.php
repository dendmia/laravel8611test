<?php

declare(strict_types=1);

namespace App\Application\Blog\Category;

use App\Models\BlogCategory;
use Illuminate\Database\Eloquent\Collection;

class Application
{
    public function getAll(): Collection|array
    {
        return BlogCategory::all();
    }
}
