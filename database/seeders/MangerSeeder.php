<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MangerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Matheus Bon',
            'role_id' => 1,
            'email' => 'admin@gmail.com',
            'password' => 'password',
            
        ]);

        // Moderador
        User::create([
            'name' => 'Leonardo Souza',
            'role_id' => 2,
            'email' => 'moderador@gmail.com',
            'password' => 'password',
            
        ]);

        // Financeiro Edit
        User::create([
            'name' => 'Marcela Ribeiro',
            'role_id' => 3,
            'email' => 'financeiro.edit@gmail.com',
            'password' => 'password',
            
        ]);

        // Financeiro Delete
        User::create([
            'name' => 'Gabriela Neves',
            'role_id' => 4,
            'email' => 'financeiro.delete@gmail.com',
            'password' => 'password',
            
        ]);
    }

}
