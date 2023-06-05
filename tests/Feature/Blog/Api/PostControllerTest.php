<?php

declare(strict_types=1);

namespace Blog\Api;

use App\Infrastructure\Blog\Post\Repository\PostRepository;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    private PostRepository $repository;
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

    public function testUpdatePost(): void
    {
        $id = $this->createPost();

        $response = $this->put(
            uri: $this->apiUrl . '/api' . '/post'. '/' . $id,
            data: [
                'category_id' => 3,
                'user_id' => 1,
                'title' => 'test post 2',
                'excerpt' => 'test2',
                'content_raw' => 'Soluta aut recusandae minima iusto',
            ]
        );

        $response->assertNoContent();
    }

    private function createPost(): int
    {
        $data = [
            'category_id' => 2,
            'user_id' => 1,
            'title' => 'test post',
            'excerpt' => 'test1',
            'content_raw' => 'Soluta aut recusandae minima iusto aut magnam eum officiis eius adipisci fuga.',
            'slug' => 'www' . time(),
            'content_html' => 'test content'
        ];

        return $this->repository->store($data);
    }

    public function setUp(): void
    {
        if (!isset($this->apiUrl)) {
            $this->apiUrl = env('APP_URL');
        }

        if (!isset($this->repository)) {
            $this->repository = new PostRepository();
        }

        parent::setUp();
    }
}
