<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Génère des données de test pour la table des paiements
         $payments = [
            [
                'id' => 1,
                'date' => now(),
                'status' => 1, // Remplacez par le statut souhaité
                'amount' => 100.00, // Remplacez par le montant souhaité
                'sale_id' => 1, // Remplacez par l'ID de la vente associée
                'payment_method_id' => 1, // Remplacez par l'ID de la méthode de paiement associée
                'created_at' => now(),
                'updated_at' => now(),
            ], 
            [
                'id' => 2,
                'date' => now(),
                'status' => 1, // Remplacez par le statut souhaité
                'amount' => 100.000, // Remplacez par le montant souhaité
                'sale_id' => 1, // Remplacez par l'ID de la vente associée
                'payment_method_id' => 1, // Remplacez par l'ID de la méthode de paiement associée
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Ajoutez d'autres entrées de paiement au besoin
        ];

        // Insère les données dans la table des paiements
        // db::table('payments')->insert($payments);
        foreach ($payments as $data) {
            if (!Payment::where('id', $data['id'])->exists()) {
                Payment::create($data);
            }
        }
        Payment::factory(3)->create(); // Crée 8 utilisateurs avec des données aléatoires
    }
    
}
