<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /* Cargos */
        $admin = Role::create(['name' => 'admin']);
        $moderator = Role::create(['name' => 'moderador']);
        $financialEdit = Role::create(['name' => 'financeiro-edit']);
        $financialDelete = Role::create(['name' => 'financeiro-delete']);

        /* Permissões */
        Permission::create(['name' => 'create']);
        Permission::create(['name' => 'read']);
        Permission::create(['name' => 'update']);
        Permission::create(['name' => 'delete']);
        
        /* Atribuição Cargos <--> Permissões */
        $admin->givePermissionTo(['create', 'read', 'update', 'delete']);
        $moderator->givePermissionTo('read');
        $financialEdit->givePermissionTo(['update', 'read']);
        $financialDelete->givePermissionTo(['delete', 'read']);

    }
}
