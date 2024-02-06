<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            
            ['id' => 1,'name' => 'Marseille', 'state_id' => 1],
            ['id' => 2,'name' => 'Lyon', 'state_id' => 2],
            ['id' => 3,'name' => 'Bordeaux', 'state_id' => 3],
            ['id' => 4,'name' => 'Toulouse', 'state_id' => 4],
            // ... Ajoutez d'autres villes selon vos besoins
        ];

        //DB::table('cities')->insert($cities);
        foreach ($cities as $data) {
            if (!City::where('id', $data['id'])->exists()) {
                City::create($data);
            }
        }
        City::factory(3)->create(); // Crée 8 utilisateurs avec des données aléatoires
    }
}
