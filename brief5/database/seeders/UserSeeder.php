<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed a user with a specific role
        DB::table('users')->insert([
            'name' => 'Ahmad',
            'email' => 'ahmad@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role_id' => 1, // Assuming role_id 1 corresponds to 'Admin'
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // You can add more user seeds as needed
    }
}
