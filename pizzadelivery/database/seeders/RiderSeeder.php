<?php

namespace Database\Seeders;

use App\Models\Rider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RiderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rider = new Rider;
        $rider->rider_name = "Rider1";
        $rider->phone = "00001";
        $rider->total_capacity = 4;
        $rider->available_capacity = 4;
        $rider->save();
    }
}
