<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class BookManagementTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic feature test example.
     */
    
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_book_creation()
    {
        $user = User::factory()->create();
        $this->actingAs($user, 'api');

        $response = $this->postJson('/api/books', [
            'title' => 'Test Book',
            'author' => 'Test Author',
            'isbn' => '1234567890123',
            'genre' => 'Fiction',
            'published_date' => now(),
            'is_public' => true,
        ]);

        $response->assertOk();
    }

    public function test_book_creation_without_authentication()
    {
        $response = $this->postJson('/api/books', [
            'title' => 'Test Book',
            'author' => 'Test Author',
            'isbn' => '1234567890123',
            'genre' => 'Fiction',
            'published_date' => now(),
            'is_public' => true,
        ]);

        $response->assertUnauthorized();
    }

    public function test_book_retrieval()
    {
        $user = User::factory()->create();
        $this->actingAs($user, 'api');

        $response = $this->getJson('/api/books');
        $response->assertOk();
       
    }
}
