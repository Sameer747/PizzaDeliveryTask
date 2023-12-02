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

        $orders = [
            [
                'userName' => "Sameer Mohsin",
                'phone' => "03012604668",
                'pizza' => "California Pizza",
                'category' => "Stuffed Crust",
                'qty' => "3",
                'price' => 10,
                'status' => 0,
            ],
            [
                'userName' => "Sameer Mohsin",
                'phone' => "03012604668",
                'pizza' => "California Pizza",
                'category' => "Stuffed Crust",
                'qty' => "4",
                'price' => 10,
                'status' => 0,
            ],
            [
                'userName' => "Sameer Mohsin",
                'phone' => "03012604668",
                'pizza' => "California Pizza",
                'category' => "Stuffed Crust",
                'qty' => "2",
                'price' => 10,
                'status' => 0,
            ],
            [
                'userName' => "Sameer Mohsin",
                'phone' => "03012604668",
                'pizza' => "California Pizza",
                'category' => "Stuffed Crust",
                'qty' => "9",
                'price' => 10,
                'status' => 0,
            ],
            [
                'userName' => "Sameer Mohsin",
                'phone' => "03012604668",
                'pizza' => "California Pizza",
                'category' => "Stuffed Crust",
                'qty' => "1",
                'price' => 10,
                'status' => 0,
            ],
            [
                'userName' => "Sameer Mohsin",
                'phone' => "03012604668",
                'pizza' => "California Pizza",
                'category' => "Stuffed Crust",
                'qty' => "1",
                'price' => 10,
                'status' => 0,
            ],
        ];

        foreach ($orders as $order) {
            Order::create([
                'userName' => $order['userName'],
                'phone' => $order['phone'],
                'pizza' => $order['pizza'],
                'category' => $order['category'],
                'qty' => $order['qty'],
                'price' => $order['price'],
                'status' => $order['status'],
            ]);
        }

        // $order = new Order();
        // $order->userName = "Example";
        // $order->phone = "03012604668";
        // $order->pizza = "California Pizza";
        // $order->category = "Stuffed Crust";
        // $order->qty = "1";
        // $order->price = 10;
        // $order->status = 0;
        // $order->save();
    }
}
