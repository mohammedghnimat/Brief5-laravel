<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Generate 10 property type records
        for ($i = 1; $i <= 10; $i++) {
            DB::table('property_types')->insert([
                'name' => 'Property Type ' . $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
