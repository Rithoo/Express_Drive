<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\sale>
 */
class SaleFactory extends Factory
{
    protected $model = Sale::class;

    public function definition()
    {

        $carIds = Car::pluck('id')->toArray();
        $userIds = User::pluck('id')->toArray();

        return [
            // 'id' => null,
            'date' => $this->faker->dateTime,
            'quantity' => $this->faker->randomNumber(2),
            'total_price' => $this->faker->randomFloat(2, 10, 1000),
            'car_id' => $this->faker->randomElement($carIds),
            'user_id' => $this->faker->randomElement($userIds),
        ];
    }
}
