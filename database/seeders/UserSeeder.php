<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!User::where('email', 'valter@email.com')->first()) {
            $admin = User::create([
                'name' => 'Valter',
                'email' => 'valter@email.com',
                'password' => Hash::make('123456', ['rounds' => 12]),
                'image' => null
            ]);

            $admin->assignRole('Admin');
        }

        if (!User::where('email', 'ricardo@email.com')->first()) {
            $professor = User::create([
                'name' => 'Ricardo',
                'email' => 'ricardo@email.com',
                'password' => Hash::make('123456', ['rounds' => 12]),
                'image' => null
            ]);

            $professor->assignRole('Professor');
        }

        if (!User::where('email', 'enzo@email.com')->first()) {
            $aluno = User::create([
                'name' => 'Enzo',
                'email' => 'enzo@email.com',
                'password' => Hash::make('123456', ['rounds' => 12]),
                'image' => null
            ]);

            $aluno->assignRole('aluno');
        }
        //

    }
}
