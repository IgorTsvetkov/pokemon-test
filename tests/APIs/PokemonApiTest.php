<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Pokemon;

class PokemonApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_pokemon()
    {
        $pokemon = Pokemon::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/pokemon', $pokemon
        );

        $this->assertApiResponse($pokemon);
    }

    /**
     * @test
     */
    public function test_read_pokemon()
    {
        $pokemon = Pokemon::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/pokemon/'.$pokemon->id
        );

        $this->assertApiResponse($pokemon->toArray());
    }

    /**
     * @test
     */
    public function test_update_pokemon()
    {
        $pokemon = Pokemon::factory()->create();
        $editedPokemon = Pokemon::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/pokemon/'.$pokemon->id,
            $editedPokemon
        );

        $this->assertApiResponse($editedPokemon);
    }

    /**
     * @test
     */
    public function test_delete_pokemon()
    {
        $pokemon = Pokemon::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/pokemon/'.$pokemon->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/pokemon/'.$pokemon->id
        );

        $this->response->assertStatus(404);
    }
}
