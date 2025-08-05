<?php

namespace Tests\Feature;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_creates_post()
    {
        $user = User::factory()->create();

        $response = $this->postJson('/api/posts', [
            'user_id' => $user->id,
            'body' => 'Test post'
        ]);

        $response->assertStatus(201)
            ->assertJsonFragment(['body' => 'Test post']);
    }

    public function test_post_comments_relationship()
    {
        $post = Post::factory()
            ->has(
                Comment::factory()->count(2)->state(function (array $attributes, Post $post) {
                    return ['post_id' => $post->id];
                })
            )
            ->create();

        $response = $this->getJson("/api/posts/{$post->id}/comments");

        $response->assertStatus(200)
            ->assertJsonCount(2, 'data');
    }
}