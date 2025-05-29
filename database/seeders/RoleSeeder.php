<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(!Role::where('name', 'Admin')->first()) {
            $admin = Role::create([
                'name' => 'Admin',
            ]);

            $admin->givePermissionTo([
                'user',
                'create-user',
                'show-user',
                'edit-user',
                'destroy-user',
                'role',
                'create-role',
                'edit-role',
                'destroy-role',
            ]);
        }

        if(!Role::where('name', 'Professor')->first()) {
            $professor = Role::create([
                'name' => 'Professor',
            ]);

            $professor->givePermissionTo([
                'user',
                'show-user',
                'edit-user',
            ]);
        }

        if(!Role::where('name', 'Aluno')->first()) {
            $aluno = Role::create([
                'name' => 'Aluno',
            ]);

            $aluno->givePermissionTo([]);
        }
        //
    }
}
