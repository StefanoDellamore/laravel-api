<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//Models
use App\Models\User;
use Illuminate\Support\Facades\Hash as FacadesHash;
//Helpers
use Illuminate\Support\Facedes\Hash;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();

        $allUsers = [
            [
                'name' => 'Stefano',
                'email' => 'dellamoreste.info@gmail.com',
                'password' => 'password',
            ]     
        ];

        foreach ($allUsers as $singleUser) {
            $user = User::create([
                'name' => $singleUser['name'],
                'email' => $singleUser['email'],
                'password' => FacadesHash::make($singleUser['password']),
            ]);
        }
    }
}
