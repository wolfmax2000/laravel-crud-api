<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_users()
    {
        User::factory()->count(3)->create();

        $response = $this->getJson('/api/users');

        $response->assertStatus(200)
            ->assertJsonCount(3, 'data');
    }

    public function test_store_creates_user()
    {
        $response = $this->postJson('/api/users', [
            'name' => 'Test User'
        ]);

        $response->assertStatus(201)
            ->assertJsonFragment(['name' => 'Test User']);

        $this->assertDatabaseHas('users', ['name' => 'Test User']);
    }

    public function test_show_returns_user()
    {
        $user = User::factory()->create();

        $response = $this->getJson("/api/users/{$user->id}");

        $response->assertStatus(200)
            ->assertJsonFragment(['id' => $user->id]);
    }
}