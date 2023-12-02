<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Generate 10 property records
        for ($i = 1; $i <= 10; $i++) {
            DB::table('properties')->insert([
                'name' => 'Property ' . $i,
                'image' => 'property_' . $i . '.jpg', // Assuming you have images named property_1.jpg, property_2.jpg, etc.
                'lessor_id' => rand(1, 10), // Assuming you have users with IDs 1 to 10
                'property_type_id' => rand(1, 10), // Assuming you have property types with IDs 1 to 10
                'location_id' => rand(1, 5), // Assuming you have locations with IDs 1 to 10
                'one_day_price' => rand(50, 500), // Adjust the price range as needed
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
