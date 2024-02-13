<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert the admin user
        DB::table('users')->insert([
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Insert the user user
        DB::table('users')->insert([
            'username' => 'user',
            'password' => Hash::make('user'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
