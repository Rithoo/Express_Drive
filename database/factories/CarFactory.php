<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Car::class;

    public function definition(): array
    {
        return [
            // 'id' => null,
            'marque' => $this->faker->word,
            'model' => $this->faker->word,
            'year' => $this->faker->year(),
            'quantity' => $this->faker->randomNumber(2),
            'price' => $this->faker->randomFloat(2, 1000, 50000),
            'picture' => $this->faker->imageUrl(),
            'status' => $this->faker->numberBetween(0, 1),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
