<?php

declare(strict_types=1);

namespace Blog\Api;

use Tests\TestCase;

class PostControllerTest extends TestCase
{
    public function testGetAllPosts(): void
    {
        $response = $this->get($this->apiUrl . '/api' . '/post');

        $response->assertStatus(200);
    }


    public function setUp(): void
    {
        if (!isset($this->apiUrl)) {
            $this->apiUrl = env('APP_URL');
        }

        parent::setUp();
    }
}
