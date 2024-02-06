<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            ['id'=> 1,'name' => 'United States'],
            ['id'=> 2,'name' => 'Canada'],
            ['id'=> 3,'name' => 'United Kingdom'],
            ['id'=> 4,'name' => 'Chilli'],
            // Ajoutez d'autres pays au besoin
        ];


        //DB::table('countries')->insert($countries);
        foreach ($countries as $data) {
            if (!Country::where('id', $data['id'])->exists()) {
                Country::create($data);
            }
        }
        Country::factory(3)->create(); // Crée 8 utilisateurs avec des données aléatoires
    }
}
