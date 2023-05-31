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

    public function testStorePost(): void
    {
        $response = $this->post(
            uri: $this->apiUrl . '/api' . '/post',
            data: [
                'category_id' => 2,
                'user_id' => 1,
                'title' => 'test post',
                'content_raw' => 'Soluta aut recusandae minima iusto aut magnam eum officiis eius adipisci fuga.',
            ]
        );

        $response->assertCreated();
    }


    public function setUp(): void
    {
        if (!isset($this->apiUrl)) {
            $this->apiUrl = env('APP_URL');
        }

        parent::setUp();
    }
}
