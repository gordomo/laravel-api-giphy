<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Favorite;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;

class FavoriteControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_add_a_favorite()
    {
        $user = User::factory()->create();
        Passport::actingAs($user);

        $response = $this->postJson('/api/favorites', [
            'gif_id' => 'test_gif_id',
            'embed_url' => 'https://giphy.com/test_gif'
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('favorites', [
            'user_id' => $user->id,
            'gif_id' => 'test_gif_id',
            'embed_url' => 'https://giphy.com/test_gif'
        ]);
    }

    /** @test */
    public function it_cant_add_a_favorite_without_autenticate()
    {
        
        $response = $this->postJson('/api/favorites', [
            'gif_id' => 'test_gif_id',
            'embed_url' => 'https://giphy.com/test_gif'
        ]);

        $response->assertStatus(401);
    }

    /** @test */
    public function it_can_list_favorites()
    {
        $user = User::factory()->create();
        Passport::actingAs($user);

        $response = $this->getJson('/api/favorites');
        $response->assertStatus(200);
    }

    /** @test */
    public function it_cant_list_favorites_without_autenticate()
    {
        $response = $this->getJson('/api/favorites');
        $response->assertStatus(401);
    }

    /** @test */
    public function it_can_delete_a_favorite()
    {
        $user = User::factory()->create();
        Passport::actingAs($user);

        $response = $this->postJson('/api/favorites', [
            'gif_id' => 'test_gif_id',
            'embed_url' => 'https://giphy.com/test_gif'
        ]);

        $response = $this->deleteJson('/api/favorites', [
            'gif_id' => 'test_gif_id',
        ]);

        $response->assertStatus(204);
        $this->assertDatabaseMissing('favorites', ['gif_id' => 'test_gif_id']);
    }

    /** @test */
    public function it_cant_delete_a_favorite_without_autenticate()
    {
        $response = $this->postJson('/api/favorites', [
            'gif_id' => 'test_gif_id',
            'embed_url' => 'https://giphy.com/test_gif'
        ]);

        $response = $this->deleteJson('/api/favorites', [
            'gif_id' => 'test_gif_id',
        ]);

        $response->assertStatus(401);
    }
}
