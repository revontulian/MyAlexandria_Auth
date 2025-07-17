<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthManagementTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_user_can_register()
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@gmail.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertStatus(302);
    }

    public function test_user_can_login()
    {
        $response = $this->post('/login', [
            'email' => 'test@gmail.com',
            'password' => 'password',
        ]);
        $response->assertStatus(302);
    }

    public function test_user_can_logout()
    {
        $response = $this->post('/logout');
        $response->assertStatus(302);
    }
}
