<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    //php artisan db:seed 

    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            RoleSeeder::class,
            LocationSeeder::class,
            UsersSeeder::class,
            PropertyTypeSeeder::class,
            PropertySeeder::class,
            BookingSeeder::class,
            ReviewSeeder::class,
            // Add other seeders here as needed
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
