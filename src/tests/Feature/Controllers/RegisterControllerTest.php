<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Laravel\Passport\Passport;

class RegisterControllerTest extends TestCase
{
    use RefreshDatabase;
    

    /** @test */
    public function it_registers_a_user_successfully()
    {
        $response = $this->postJson('/api/register', [
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => 'password123',
            'c_password' => 'password123',
        ]);

        $this->assertDatabaseHas('users', [
            'email' => 'testuser@example.com'
        ]);
    }

    /** @test */
    public function it_fails_registration_due_to_existing_email()
    {
        User::factory()->create([
            'email' => 'testuser@example.com',
        ]);

        $response = $this->postJson('/api/register', [
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => 'password123',
            'c_password' => 'password123',
        ]);

        $response->assertStatus(422)
                 ->assertJsonStructure([
                     'success',
                     'message'
                 ]);
    }

    /** @test */
    public function it_fails_login_with_invalid_credentials()
    {
        $user = User::factory()->create([
            'email' => 'testuser@example.com',
            'password' => bcrypt('password123'),
        ]);

        $response = $this->postJson('/api/login', [
            'email' => 'testuser@example.com',
            'password' => 'wrongpassword',
        ]);

        $response->assertStatus(401)
                 ->assertJsonStructure([
                     'success',
                     'message'
                 ]);
    }
}
