<?php

namespace Database\Seeders;

use App\Models\Sale;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Génère des données de vente de test
         $sales = [
            [
                'id' => 1,
                'date' => now(),
                'quantity' => 5,
                'total_price' => 5000.00,
                'car_id' => 1, // Remplacez par l'ID d'une voiture existante
                'user_id' => 2, // Remplacez par l'ID d'un utilisateur existant
            ], 
            
            [
                'id' => 2,
                'date' => now(),
                'quantity' => 6,
                'total_price' => 5000.00,
                'car_id' => 1, // Remplacez par l'ID d'une voiture existante
                'user_id' => 2, // Remplacez par l'ID d'un utilisateur existant
            ],
            // Ajoutez d'autres données de vente selon vos besoins
        ];

        // Insère les données dans la table des ventes
        // DB::table('sales')->insert($sales);
        foreach ($sales as $data) {
            if (!Sale::where('id', $data['id'])->exists()) {
                Sale::create($data);
            }
        }
        Sale::factory(3)->create(); // Crée 8 utilisateurs avec des données aléatoires
    }
}
