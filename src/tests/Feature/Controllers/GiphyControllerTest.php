<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Favorite;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;

class GiphyControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_search()
    {
        $user = User::factory()->create();
        Passport::actingAs($user);

        $response = $this->getJson('api/search-gifs?query=eggs');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'success',
                'data',
                'message',
                'code'
        ]);
        
    }

    /** @test */
    public function it_cant_search_without_autenticate()
    {
        $response = $this->getJson('api/search-gifs?query=eggs');

        $response->assertStatus(401);
        
    }

    /** @test */
    public function it_can_search_by_id()
    {
        $user = User::factory()->create();
        Passport::actingAs($user);

        $response = $this->getJson('api/search-by-id?gifId=OQkjelDb4JcuP3rEBw');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'success',
                'data',
                'message',
                'code'
        ]);
        
    }

    /** @test */
    public function it_cant_search_by_id_without_autenticate()
    {
        $response = $this->getJson('api/search-by-id?query=OQkjelDb4JcuP3rEBw');

        $response->assertStatus(401);
        
    }


}
