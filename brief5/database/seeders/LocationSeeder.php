<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            Location::create(["name"=> "Amman",]);
            Location::create(["name"=> "Irbid",]);
            Location::create(["name"=> "Zarqa'a",]);
            Location::create(["name"=> "Aqaba",]);
            Location::create(["name"=> "Salt",]);
        
    }
}
