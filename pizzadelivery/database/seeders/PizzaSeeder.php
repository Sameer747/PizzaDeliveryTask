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
        $pizza = new Pizza;
        $pizza->name ="Chicago Style";
        $pizza->category="chicago";
        $pizza->save();
    }
}
