<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserManagementTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_user_can_be_created()
    {
        $user = [
            'name' => 'Test User',
            'email' => 'test@gmail.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ];

        $response = $this->postJson('/api/users', $user);

        $response->assertStatus(201);
    }

    public function test_user_not_found()
    {
        $response = $this->getJson('/api/users/999');

        $response->assertNotFound();
        $response->assertJson([
            'status' => 0,
            'message' => 'User not found',
        ]);
    }

    public function test_users_can_be_listed()
    {
        $response = $this->getJson('/api/users');

        $response->assertOk();
        $response->assertJsonStructure([
            'status',
            'message',
            'data' => [
                '*' => [
                    'id',
                    'name',
                    'email',
                    'created_at',
                    'updated_at',
                ]
            ]
        ]);
    }

    public function test_user_can_be_retrieved()
    {
        $user = User::factory()->create();

        $response = $this->getJson('/api/users/' . $user->id);

        $response->assertOk();
        $response->assertJsonStructure([
            'status',
            'message',
            'data' => [
                'id',
                'name',
                'email',
                'created_at',
                'updated_at',
            ]
        ]);
    }

    public function test_user_can_be_updated()
    {
        $user = User::factory()->create();

        $updateData = [
            'name' => 'Updated User',
            'email' => 'updated@gmail.com',
            'password' => 'newpassword',
            'password_confirmation' => 'newpassword',
        ];

        $response = $this->putJson('/api/users/' . $user->id, $updateData);
        $response->assertOk();
        $response->assertJson([
            'status' => 1,
            'message' => 'User updated successfully',
            'data' => [
                'id' => $user->id,
                'name' => 'Updated User',
                'email' => 'updated@gmail.com',
            ]
        ]);
    }

    public function test_user_can_be_deleted()
    {
        $user = User::factory()->create();

        $response = $this->deleteJson('/api/users/' . $user->id);

        $response->assertOk();
        $response->assertJson([
            'status' => 1,
            'message' => 'User deleted successfully',
        ]);
    }
}
