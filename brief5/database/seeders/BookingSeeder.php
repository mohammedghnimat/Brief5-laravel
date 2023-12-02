<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Generate 10 booking records
 
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

    DB::table('bookings')->insert([
        'property_id' => rand(1, 10), // Assuming you have properties with IDs 1 to 10
        'renter_id' => $renterId,
        'start_date' => now()->addDays($i), // Use a different date logic based on your requirements
        'end_date' => now()->addDays($i + 5), // Use a different date logic based on your requirements
        'total_price' => rand(100, 1000), // Adjust the price range as needed
        'status' => ($i % 2 == 0) ? 'confirmed' : 'pending', // Example status alternation
        'created_at' => now(),
        'updated_at' => now(),
    ]);
}
    }
}
