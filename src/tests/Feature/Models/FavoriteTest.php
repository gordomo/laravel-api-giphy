<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Favorite;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FavoriteTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_favorite()
    {
        $user = User::factory()->create();

        $favorite = Favorite::create([
            'user_id' => $user->id,
            'gif_id' => 'test_gif_id',
            'embed_url' => "https://giphy.com/embed/OQkjelDb4JcuP3rEBw",
        ]);

        $this->assertDatabaseHas('favorites', [
            'user_id' => $user->id,
            'gif_id' => 'test_gif_id',
            'embed_url' => "https://giphy.com/embed/OQkjelDb4JcuP3rEBw",
        ]);
    }

    /** @test */
    public function it_can_delete_a_favorite()
    {
        $user = User::factory()->create();

        $favorite = Favorite::create([
            'user_id' => $user->id,
            'gif_id' => 'test_gif_id_2',
            'embed_url' => "https://giphy.com/embed/OQkjelDb4JcuP3rEBw",
        ]);

        $favorite = Favorite::where('user_id', $user->id)->where('gif_id', 'test_gif_id_2')->firstOrFail();
        $favorite->delete();

        $this->assertDatabaseMissing('favorites', ['id' => $favorite->id]);
    }
}
