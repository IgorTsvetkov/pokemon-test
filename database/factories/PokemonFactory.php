<?php

namespace Database\Factories;

use App\Models\Pokemon;
use Illuminate\Database\Eloquent\Factories\Factory;

class PokemonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pokemon::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->randomDigitNotNull,
        'identifier' => $this->faker->text,
        'species_id' => $this->faker->randomDigitNotNull,
        'height' => $this->faker->randomDigitNotNull,
        'weight' => $this->faker->randomDigitNotNull,
        'base_experience' => $this->faker->randomDigitNotNull,
        'order' => $this->faker->randomDigitNotNull,
        'is_default' => $this->faker->randomDigitNotNull
        ];
    }
}
