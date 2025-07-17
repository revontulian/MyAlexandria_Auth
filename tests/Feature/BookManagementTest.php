<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Book;

class BookManagementTest extends TestCase
{
    use RefreshDatabase, WithFaker;

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

    public function test_books_retrieval()
    {
        $user = User::factory()->create();
        $this->actingAs($user, 'api');

        $response = $this->getJson('/api/books');
        $response->assertOk();
    }

    public function test_single_book_retrieval()
    {
        $user = User::factory()->create();
        $this->actingAs($user, 'api');
        $book = Book::factory()->create([
            'user_id' => $user->id,
        ]);
        $response = $this->getJson('/api/books/' . $book->id);
        $response->assertOk();
    }

    public function test_book_deletion()
    {
        $user = User::factory()->create();
        $this->actingAs($user, 'api');

        $book = Book::factory()->create([
            'user_id' => $user->id,
        ]);

        $response = $this->deleteJson('/api/books/' . $book->id);
        $response->assertStatus(201);
    }

    public function test_book_update()
    {
        $user = User::factory()->create();
        $this->actingAs($user, 'api');

        $book = Book::factory()->create([
            'user_id' => $user->id,
        ]);

        $response = $this->putJson('/api/books/' . $book->id, [
            'title' => 'Updated Book Title',
            'author' => 'Updated Author',
            'isbn' => '1234567890123',
            'genre' => 'Updated Genre',
            'published_date' => now(),
            'is_public' => false,
        ]);

        $response->assertOk();
    }
}
