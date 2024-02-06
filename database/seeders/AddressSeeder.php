<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Génère des données de test pour la table "addresses"
        $addresses = [
            [
                'id' => 1,
                'line1' => '123 Main St',
                'line2' => 'Apt 4',
                'line3' => 'Building C',
                'street' => 'Downtown',
                'postal_code' => '12345',
                'city_id' => 1, // Remplacez avec l'ID de la ville correspondante dans votre table "cities"
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'line1' => '456 Oak St',
                'line2' => 'Suite 102',
                'line3' => 'Tower B',
                'street' => 'Uptown',
                'postal_code' => '67890',
                'city_id' => 2, // Remplacez avec l'ID de la ville correspondante dans votre table "cities"
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Ajoutez d'autres entrées selon vos besoins
        ];

        // Insère les données dans la table "addresses"
        // DB::table('addresses')->insert($addresses);
        foreach ($addresses as $data) {
            if (!Address::where('id', $data['id'])->exists()) {
                Address::create($data);
            }
        }
        Address::factory(3)->create(); // Crée 8 utilisateurs avec des données aléatoires


    }
}
