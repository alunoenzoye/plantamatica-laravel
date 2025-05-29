<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'user',
            'create-user',
            'show-user',
            'edit-user',
            'destroy-user',
            'role',
            'create-role',
            'edit-role',
            'destroy-role',
        ];

        foreach($permissions as $permission) {
            $existingPermission = Permission::where('name', $permission)->first();

            if(!$existingPermission) {
                Permission::create([
                    'name' => $permission,
                    'guard_name' => 'web',
                ]);
            };
        }
        //
    }
}
