<?php

namespace Database\Factories;

use App\Models\Payment;
use App\Models\Payment_method;
use App\Models\PaymentMethod;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment_method>
 */
class PaymentMethodFactory extends Factory
{
    protected $model = PaymentMethod::class;

    public function definition()
    {
        return [
            // 'id' => null,
            'name' => $this->faker->creditCardType,
            'type_card' => $this->faker->creditCardType,
            'expiration_date' => $this->faker->date,
            'cvv_card' => $this->faker->randomNumber(3),
        ];
    }
}
