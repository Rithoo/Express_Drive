<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $states = [
            ['id'=> 1,'name' => 'Île-de-France', 'country_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id'=> 2,'name' => 'Occitanie', 'country_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['id'=> 3,'name' => 'Grand Est', 'country_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['id'=> 4,'name' => 'Grand Est', 'country_id' => 4, 'created_at' => now(), 'updated_at' => now()],

            // Ajoutez d'autres données selon vos besoins
        ];

        // Insère les données dans la table
        // DB::table('states')->insert($states);
        foreach ($states as $data) {
            if (!State::where('id', $data['id'])->exists()) {
                State::create($data);
            }
        }
        State::factory(3)->create(); // Crée 8 utilisateurs avec des données aléatoires
    }
}
