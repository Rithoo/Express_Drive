<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\State;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\City>
 */
class CityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = City::class;

    public function definition()
    {

        $stateIds = State::pluck('id')->toArray();
        return [
            // 'id' => null,
            'name' => $this->faker->city,
            'state_id' => $this->faker->randomElement($stateIds),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
