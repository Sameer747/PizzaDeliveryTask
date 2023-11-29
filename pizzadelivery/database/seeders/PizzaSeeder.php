<?php

namespace Database\Seeders;

use App\Models\Pizza;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PizzaSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        used for multiple data insertion via seed
        */
        $pizzas = [
            [
                'name' => 'Chicago Style Pizza',

                'category' => 'Thin Crust',
                'price' => '10'
            ],
            [
                'name' => 'Brick Oven Pizza',
                'category' => 'Thin Crust',
                'price' => '10'
            ],
            [
                'name' => 'Italian Pizza',
                'category' => 'Thin Crust',
                'price' => '10'
            ],
            [
                'name' => 'Neapolitan Pizza',
                'category' => 'Thin Crust',
                'price' => '10'
            ],
            [
                'name' => 'California Pizza',
                'category' => 'Thin Crust',
                'price' => '10'
            ],
            [
                'name' => 'New York Style Pizza',
                'category' => 'Thin Crust',
                'price' => '10'
            ],
            [
                'name' => 'Sicilian Pizza',
                'category' => 'Thin Crust',
                'price' => '10'
            ],
        ];

        foreach ($pizzas as $pizza) {
            Pizza::create([
                'name' => $pizza['name'],
                'category' => $pizza['category'],
                'price' => $pizza['price']
            ]);
        }

        /*
        used for single data insertion
        $pizza = new Pizza;
         $pizza->name = "Chicago Style";
         $pizza->category = "chicago";
         $pizza->save();
        */

    }
}
