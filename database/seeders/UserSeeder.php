<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            
            // super admin
            [
                'name' => 'super admin',
                'user_type' => 'super admin',
                'status' => 'active',
                'email' => 'super.admin@gmail.com',
                'password' => Hash::make('12345678')

            ],

             // super admin
             [
                'name' => 'administrator',
                'user_type' => 'administrator',
                'status' => 'active',
                'email' => 'administrator@gmail.com',
                'password' => Hash::make('12345678')

            ],

             // super admin
             [
                'name' => 'user',
                'user_type' => 'user',
                'status' => 'active',
                'email' => 'user@gmail.com',
                'password' => Hash::make('12345678')

            ],
        ]);
    }
}
