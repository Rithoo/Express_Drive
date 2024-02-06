<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carsData = [
            [
                'id' => 1,
                'marque' => 'Toyota',
                'model' => 'Camry',
                'year' => 2022,
                'quantity' => 10,
                'price' => 25000.00,
                'picture' => null,

            ],
            [
                'id' => 2,
                'marque' => 'Ford',
                'model' => 'Mustang',
                'year' => 2021,
                'quantity' => 5,
                'price' => 35000.00,
                'picture' => null,
            ],
            // Ajoutez d'autres données selon vos besoins
        ];

       // DB::table('cars')->insert($carsData);
        foreach ($carsData as $data) {
            if (!Car::where('id', $data['id'])->exists()) {
                Car::create($data);
            }
        }
        Car::factory(3)->create(); // Crée 8 utilisateurs avec des données aléatoires
    }
}
