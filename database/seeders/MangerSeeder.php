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
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => 'password',
        ])->assignRole('admin');

        // Moderador
        User::create([
            'name' => 'Moderador',
            'email' => 'moderador@gmail.com',
            'password' => 'password',
        ])->assignRole('moderador');

        // Financeiro Edit
        User::create([
            'name' => 'Financeiro Edit',
            'email' => 'finaceiro.edit@gmail.com',
            'password' => 'password',
        ])->assignRole('financeiro-edit');

        // Financeiro Delete
        User::create([
            'name' => 'Financeiro Delete',
            'email' => 'finaceiro.delete@gmail.com',
            'password' => 'password',
        ])->assignRole('financeiro-delete');
    }

}
