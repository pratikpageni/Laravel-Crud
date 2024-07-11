<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    
    public function test_login_redirect_to_dashboard_successfully()
    {
        User::factory()->create([
            'email'=>'test@gmail.com',
            'password'=>bcrypt('password'),
        ]);

        $response = $this->post('/login', [
            'email'=>'test@gmail.com',
            'password'=>'password',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/dashboard');
    }

    public function test_auth_user_can_access_dashboard()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertStatus(200);
    }

    public function test_inactive_user_cannot_access_products()
    {
        $user = User::factory()->create(['active' => false]);

        $response = $this->actingAs($user)->get('/products');

        $response->assertStatus(403);
    }

    public function test_user_can_logout()
    {
        $user = User::factory()->create();

        $this->actingAs($user);
        $response = $this->post('/logout');

        $response->assertRedirect('/');
        $this->assertGuest();
    }
}
