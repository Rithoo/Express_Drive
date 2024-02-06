<?php

namespace Database\Factories;

use App\Models\Payment;
use App\Models\Payment_method;
use App\Models\PaymentMethod;
use App\Models\Sale;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\payment>
 */
class PaymentFactory extends Factory
{
    protected $model = Payment::class;

    public function definition()
    {

        $saleIds = Sale::pluck('id')->toArray();
        $payMIds = PaymentMethod::pluck('id')->toArray();
        return [
            // 'id' => null,
            'date' => $this->faker->dateTime(),
            'status' => $this->faker->randomElement([0, 1]), // Assuming status is a tiny integer (0 or 1)
            'amount' => $this->faker->randomFloat(2, 10, 500), // Adjust the range based on your requirements
            'sale_id' => $this->faker->randomElement($saleIds),
            'payment_method_id' => $this->faker->randomElement($payMIds),
            'created_at' => $this->faker->dateTime(),
            'updated_at' => $this->faker->dateTime(),
        ];
    }
}
