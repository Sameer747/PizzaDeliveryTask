<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $order = new Order();
        $order->userName = "Example";
        $order->phone = "03012604668";
        $order->pizza ="California Pizza";
        $order->category ="Stuffed Crust";
        $order->qty = "1";
        $order->price = 10;
        $order->status = 0;
        $order->save();
    }
}
