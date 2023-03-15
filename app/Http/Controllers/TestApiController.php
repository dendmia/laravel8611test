<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\TestApiRequest;
use Illuminate\Http\Request;

class TestApiController extends Controller
{
    public function testGet(TestApiRequest $request)
    {
        return response(status: 200);
    }
}
