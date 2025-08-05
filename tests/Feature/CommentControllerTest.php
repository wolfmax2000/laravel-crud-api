<?php

namespace Tests\Feature;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CommentControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_creates_new_comment()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create();
        $data = [
            'post_id' => $post->id,
            'user_id' => $user->id,
            'body' => 'Test comment'
        ];

        $response = $this->postJson('/api/comments', $data);

        $response->assertStatus(201)
            ->assertJsonFragment(['body' => 'Test comment']);

        $this->assertDatabaseHas('comments', $data);
    }

    public function test_update_modifies_comment()
    {
        $comment = Comment::factory()->create();
        $data = ['body' => 'Updated comment'];

        $response = $this->putJson("/api/comments/{$comment->id}", $data);

        $response->assertStatus(200)
            ->assertJsonFragment($data);

        $this->assertDatabaseHas('comments', $data);
    }
}