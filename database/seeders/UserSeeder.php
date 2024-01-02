<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //création de l'administrateur
        User::create([
            'pseudo' =>'administrateur',
            'password'=>Hash::make('Azerty88@'),
            'email'=>'admin@niceplace.fr',
            'email_verified_at'=>now(),
            'remember_token'=>Str::random(10),
            'role_id'=>2,
        ]);

        //Creation d'un utilisateur test
        User::create([
            'pseudo' =>'utilisateur',
            'password'=>Hash::make('Azerty88@'),
            'email'=>'utilisateur@test.fr',
            'email_verified_at'=>now(),
            'remember_token'=>Str::random(10),
            'role_id'=>'1',
        ]);

        //Creation de 8 users aléatoires
        User::factory(8)->create();
    }
}
