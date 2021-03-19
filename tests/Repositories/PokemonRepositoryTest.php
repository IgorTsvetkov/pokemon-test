<?php namespace Tests\Repositories;

use App\Models\Pokemon;
use App\Repositories\PokemonRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PokemonRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PokemonRepository
     */
    protected $pokemonRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->pokemonRepo = \App::make(PokemonRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_pokemon()
    {
        $pokemon = Pokemon::factory()->make()->toArray();

        $createdPokemon = $this->pokemonRepo->create($pokemon);

        $createdPokemon = $createdPokemon->toArray();
        $this->assertArrayHasKey('id', $createdPokemon);
        $this->assertNotNull($createdPokemon['id'], 'Created Pokemon must have id specified');
        $this->assertNotNull(Pokemon::find($createdPokemon['id']), 'Pokemon with given id must be in DB');
        $this->assertModelData($pokemon, $createdPokemon);
    }

    /**
     * @test read
     */
    public function test_read_pokemon()
    {
        $pokemon = Pokemon::factory()->create();

        $dbPokemon = $this->pokemonRepo->find($pokemon->id);

        $dbPokemon = $dbPokemon->toArray();
        $this->assertModelData($pokemon->toArray(), $dbPokemon);
    }

    /**
     * @test update
     */
    public function test_update_pokemon()
    {
        $pokemon = Pokemon::factory()->create();
        $fakePokemon = Pokemon::factory()->make()->toArray();

        $updatedPokemon = $this->pokemonRepo->update($fakePokemon, $pokemon->id);

        $this->assertModelData($fakePokemon, $updatedPokemon->toArray());
        $dbPokemon = $this->pokemonRepo->find($pokemon->id);
        $this->assertModelData($fakePokemon, $dbPokemon->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_pokemon()
    {
        $pokemon = Pokemon::factory()->create();

        $resp = $this->pokemonRepo->delete($pokemon->id);

        $this->assertTrue($resp);
        $this->assertNull(Pokemon::find($pokemon->id), 'Pokemon should not exist in DB');
    }
}
