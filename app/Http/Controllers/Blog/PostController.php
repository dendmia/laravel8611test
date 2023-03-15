<?php

namespace App\Http\Controllers\Blog;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends BaseController
{
    public function index()
    {
        $items = BlogPost::all();

        return view('blog.posts.index', compact(var_name: 'items'));
    }
}
