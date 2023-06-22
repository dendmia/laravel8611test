<?php

declare(strict_types=1);

namespace Blog\Api;

use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    public function testGetOneCategory(): void
    {
        $category = $this->post(
            $this->apiUrl . '/api' . '/category',
            [
                'title' => 'test_category' . time(),
                'description' => 'test_description'
            ],
        );

        $response = $this->get($this->apiUrl . '/api' . '/category/' . $category['id']);
        $response->assertOk();
        $response->assertJsonFragment(['id' => $category['id']]);
    }

    public function testGetAllCategories(): void
    {
        $response = $this->get($this->apiUrl . '/api' . '/category');

        $response->assertOk();
    }

    public function testStoreCategory(): void
    {
        $response = $this->post(
            $this->apiUrl . '/api' . '/category',
            [
                'title' => 'test_category' . time(),
                'description' => 'test_description'
            ],
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
