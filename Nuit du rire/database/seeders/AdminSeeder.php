<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nom'=> 'YODA',
            'prenom' => 'NICOLAS',
            'email' => 'nico@gmail.com',
            'password' => Hash::make('11111111'),
            'etat' => 1,
            'role' => 'admin'
        ]);
        // DB::table('users')->insert([

        // ]);
        User::create([
            'nom' => 'KANDO',
            'prenom' => 'Naomie',
            'email' => 'nao@gmail.com',
            'password' => Hash::make('11111111'),
            'role' => 'client'
        ]);
    }
}
