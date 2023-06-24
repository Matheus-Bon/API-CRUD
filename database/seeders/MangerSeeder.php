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
            'email' => 'admin@gmail.com',
            'password' => 'password',
        ])->assignRole('admin');

        // Moderador
        User::create([
            'name' => 'Leonardo Souza',
            'email' => 'moderador@gmail.com',
            'password' => 'password',
        ])->assignRole('moderador');

        // Financeiro Edit
        User::create([
            'name' => 'Marcela Ribeiro',
            'email' => 'finaceiro.edit@gmail.com',
            'password' => 'password',
        ])->assignRole('financeiro-edit');

        // Financeiro Delete
        User::create([
            'name' => 'Gabriela Neves',
            'email' => 'finaceiro.delete@gmail.com',
            'password' => 'password',
        ])->assignRole('financeiro-delete');
    }

}
