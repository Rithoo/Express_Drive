<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'id' => 1,
                'last_name' => 'Doe',
                'first_name' => 'John',
                'email' => 'john.doe@example.com',
                'password' => Hash::make('password'), // Vous devriez utiliser bcrypt() pour hasher le mot de passe
                'avatar' => null,
                'address_id' => 1, // Remplacez cela par l'ID réel de l'adresse associée
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'last_name' => 'Smith',
                'first_name' => 'Jane',
                'email' => 'jane.smith@example.com',
                'password' => Hash::make('password'),
                'avatar' => null,
                'address_id' => 2, // Remplacez cela par l'ID réel de l'adresse associée
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Ajoutez d'autres utilisateurs si nécessaire
        ];

        // Insérer les données dans la table users
        // DB::table('users')->insert($users);
        foreach ($users as $data) {
            if (!User::where('id', $data['id'])->exists()) {
                User::create($data);
            }
        }
        User::factory(3)->create(); // Crée 8 utilisateurs avec des données aléatoires
    }
}
