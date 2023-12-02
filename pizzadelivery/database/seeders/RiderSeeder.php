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
        $riders = [
            [
                'rider_name' => 'Rider1',
                'phone' => '001',
                'capacity' => '10'
            ],
            [
                'rider_name' => 'Rider2',
                'phone' => '002',
                'capacity' => '5'
            ],
            [
                'rider_name' => 'Rider3',
                'phone' => '003',
                'capacity' => '1'
            ],
            [
                'rider_name' => 'Rider4',
                'phone' => '004',
                'capacity' => '2'
            ],
            [
                'rider_name' => 'Rider5',
                'phone' => '005',
                'capacity' => '3'
            ],
        ];

        foreach ($riders as $rider) {
            Rider::create([
                'rider_name' => $rider['rider_name'],
                'phone' => $rider['phone'],
                'capacity' => $rider['capacity']
            ]);
        }

        // $rider = new Rider;
        // $rider->rider_rider_name = "Rider1";
        // $rider->phone = "00001";
        // $rider->total_capacity = 4;
        // $rider->available_capacity = 4;
        // $rider->save();
    }
}
