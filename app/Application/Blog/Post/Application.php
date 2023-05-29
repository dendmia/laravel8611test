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
}
