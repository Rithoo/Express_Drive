<?php

namespace Database\Factories;

use App\Models\State;
use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\State>
 */
class StateFactory extends Factory
{
    protected $model = State::class;

    public function definition(): array
    {
        // Récupérer un pays existant ou en créer un nouveau
        //$country = Country::inRandomOrder()->first() ?? Country::factory()->create();

        $countryIds = Country::pluck('id')->toArray();

        return [
            //'id' => null,
            'name' => $this->faker->state,
            'country_id' => $this->faker->randomElement($countryIds),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
