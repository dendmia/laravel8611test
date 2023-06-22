<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;

class TestApiControllerTest extends TestCase
{
    private string $apiUrl;

    public function testExample(): void
    {
        $response = $this->get($this->apiUrl . '/api' . '/test_get');

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
