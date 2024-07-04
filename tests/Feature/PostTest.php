<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;
    public function test_inactive_user_cannot_access_post()
    {

        $user = User::factory()->create(['active' => false]);

        $response = $this->actingAs($user)->get('/posts');

        $response->assertStatus(403);
    }
    public function test_authenticated_active_user_can_create_post()
    {
        $user = User::factory()->create(['active' => true]);

        $response = $this->actingAs($user)->post('/posts', [
            'title' => 'Test Post',
            'description' => 'This is a test post.',
        ]);

        $response->assertStatus(302); 
        $this->assertDatabaseHas('posts', [
            'title' => 'Test Post',
            'description' => 'This is a test post.',
        ]);
        
    }
    public function test_authenticated_user_can_update_post()
    {
        $user = User::factory()->create(['active' => true]);
        $post = Post::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->put("/posts/{$post->id}", [
            'title' => 'Updated Post',
            'description' => 'This is an updated test post.',
        ]);

        $response->assertStatus(302); 
        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'title' => 'Updated Post',
            'description' => 'This is an updated test post.',
        ]);
    }

    public function test_authenticated_active_user_can_delete_post()
    {
        $user = User::factory()->create(['active' => true]);
        $post = Post::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->delete("/posts/{$post->id}");

        $response->assertStatus(302); 
        $this->assertDatabaseMissing('posts', [
            'id' => $post->id,
        ]);
    }
    public function test_guest_cannot_create_post()
    {
        $response = $this->post('/posts', [
            'title' => 'Test Post',
            'description' => 'This is a test post.',
        ]);

        $response->assertRedirect('/login'); 
    }
}
