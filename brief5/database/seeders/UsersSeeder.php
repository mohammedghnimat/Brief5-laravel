<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Generate 10 user records
        for ($i = 1; $i <= 10; $i++) {
            DB::table('users')->insert([
                'name' => 'User' . $i,
                'image' => 'image' . $i.'png',
                'email' => 'user' . $i . '@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'), // You can change 'password' to the desired default password
                'role_id' => rand(1, 3), // Assuming roles are already seeded with IDs 1, 2, 3
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
