<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{

    protected $model = Address::class;



    public function definition()
    {

        $cityIds = City::pluck('id')->toArray();

        return [
            // 'id' => null,
            'line1' => $this->faker->streetAddress,
            'line2' => $this->faker->secondaryAddress,
            'line3' => $this->faker->optional()->secondaryAddress,
            'street' => $this->faker->streetName,
            'postal_code' => $this->faker->postcode,
            'city_id' => $this->faker->randomElement($cityIds),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

