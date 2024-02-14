<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        // Insert the admin user
        DB::table('users')->insert([
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'is_admin' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Insert the user user
        DB::table('users')->insert([
            'email' => 'user@gmail.com',
            'password' => Hash::make('user'),
            'is_admin' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Insert the user user1
        DB::table('users')->insert([
            'email' => 'user1@gmail.com',
            'password' => Hash::make('user1'),
            'is_admin' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
