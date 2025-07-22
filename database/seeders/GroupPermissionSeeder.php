<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Group;
use App\Models\Permission;
use App\Models\User;


class GroupPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Criação dos grupos
        $adminGroup = Group::create(['name' => 'Administrador']);
        $financeGroup = Group::create(['name' => 'Financeiro']);
        $secretaryGroup = Group::create(['name' => 'Secretária']);

        // Permissões por grupo
        $adminGroup->permissions()->createMany([
            ['key' => 'financeiro'],
            ['key' => 'secretario'],
            ['key' => 'admin'],
            ['key' => 'secretario'],
        ]);

        $financeGroup->permissions()->createMany([
            ['key' => 'financeiro'],
            ['key' => 'secretario'],
        ]);

        $secretaryGroup->permissions()->createMany([
            ['key' => 'admin'],
            ['key' => 'secretario'],
        ]);

        // Criação dos usuários e vinculação ao grupo

        $adminUser = User::create([
            'name' => 'Usuário Administrador',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);
        $adminUser->groups()->attach($adminGroup);

        $financeUser = User::create([
            'name' => 'Usuário Financeiro',
            'email' => 'financeiro@example.com',
            'password' => bcrypt('password'),
        ]);
        $financeUser->groups()->attach($financeGroup);

        $secretaryUser = User::create([
            'name' => 'Usuário Secretária',
            'email' => 'secretaria@example.com',
            'password' => bcrypt('password'),
        ]);
        $secretaryUser->groups()->attach($secretaryGroup);
    }
}
