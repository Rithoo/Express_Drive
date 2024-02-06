<?php

namespace Database\Seeders;

use App\Models\Payment_method;
use App\Models\PaymentMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $paymentMethods = [
            [
                'id' => 1,
                'name' => 'Carte de crédit',
                'type_card' => 'Visa',
                'expiration_date' => '2024-12-31',
                'cvv_card' => 123,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Carte de débit',
                'type_card' => 'MasterCard',
                'expiration_date' => '2025-06-30',
                'cvv_card' => 456,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Ajoutez d'autres méthodes de paiement si nécessaire
        ];

        // Insérer les données dans la table payment_methods
        //DB::table('payment_methods')->insert($paymentMethods);
        foreach ($paymentMethods as $data) {
            if (!PaymentMethod::where('id', $data['id'])->exists()) {
                PaymentMethod::create($data);
            }
        }
        PaymentMethod::factory(3)->create(); // Crée 8 utilisateurs avec des données aléatoires
    }
}
