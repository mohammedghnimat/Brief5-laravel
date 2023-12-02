<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Generate 10 review records
        for ($i = 1; $i <= 10; $i++) {
            $renterId = DB::table('users')
                ->where('role_id', 3) // Assuming role_id 3 represents renters
                ->inRandomOrder()
                ->value('id');
        
            if (!$renterId) {
                // Log an error or handle the case where there is no renter with role_id = 3
                Log::error('No renter found with role_id = 3');
                continue;
            }
        
            DB::table('reviews')->insert([
                'property_id' => rand(1, 10), // Assuming you have properties with IDs 1 to 10
                'renter_id' => $renterId,
                'rating' => rand(1, 5), // Adjust the rating range as needed
                'comment' => 'This is review ' . $i . '. Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
