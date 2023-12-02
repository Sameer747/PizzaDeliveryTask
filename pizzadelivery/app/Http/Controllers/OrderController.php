<?php

namespace App\Http\Controllers;

use App\Http\Requests\Order\StoreRequest;
use App\Http\Requests\Order\UpdateRequest;
use App\Models\Dashboard;
use App\Models\Order;
use App\Models\Pizza;
use App\Models\Rider;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Alert;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return view('order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pizzas = Pizza::all();
        return view('order.create', compact('pizzas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        // dd($request->all());exit;
        $request->createOrder($request);
        toast(__('Created Successfully!'), 'success', 'top')->position('top-end')->width('400');
        return redirect()->route('order.order-delivery.index');
    }

    /**
     * Complete Order.
     */
    // public function complete_Order(Request $request)
    // {
    //     /*
    //     get all pending orders
    //     get all qty of pending orders
    //     check avai cap of rider
    //     assign rider based on qty
    //     */
    //     // total riders count
    //     $totalRiders = Rider::select('id')->get()->count();
    //     // total orders count
    //     $totalOrders = Order::select('id')->get()->count();
    //     // for loop to run riders
    //     for ($i = 1; $i <= $totalRiders; $i++) {
    //         // db call to get first available rider
    //         $riders = DB::table('riders')->where('available_capacity', '>', '0')->get(['id', 'total_capacity', 'available_capacity'])->first();
    //         // echo "<br>" . "<b>Outer Iteration: <b>" . $i . "<br>";
    //         // print_r($riders);
    //         if ($riders->available_capacity === null || 0) {
    //             break;
    //         } else {
    //             $availableCapacity = $riders->available_capacity;
    //         }
    //         // echo "<br>" . "available capacity: " . $availableCapacity;
    //         for ($j = 1; $j <= $totalOrders; $j++) {
    //             $orders = DB::table('orders')->where('qty', '>', '0')->where('status', '===', '0')->get(['id', 'qty', 'status'])->first();
    //             // echo "<br>" . "<b>Inner Iteration: <b>" . $j . "<br>";
    //             // print_r($orders);
    //             if ($orders->qty === null || 0) {
    //                 break;
    //             } else {
    //                 $orderQuantity = $orders->qty;
    //             }
    //             // echo "<br>" . "available capacity: " . $orderQuantity;
    //             // if capacity is >= qty then update the order table status and update rider capacity
    //             if ($availableCapacity >= $orderQuantity) {
    //                 // echo "in if :";
    //                 // echo "<pre> Ava cap > :";
    //                 // print_r($availableCapacity);
    //                 // echo "</pre>";
    //                 //calculate
    //                 $availableCapacity = $availableCapacity - $orderQuantity;
    //                 // echo "<pre> rideronhand :";
    //                 // print_r($availableCapacity);
    //                 // echo "</pre>";
    //                 // dd($rideronHand);
    //                 //update rider capacity
    //                 $rider = Rider::findOrFail($riders->id);
    //                 $rider->available_capacity = $availableCapacity;
    //                 $rider->save();
    //                 //update order status
    //                 $order = Order::findOrFail($orders->id);
    //                 $order->qty = 0;
    //                 // if ($availableCapacity == 0) {
    //                 $order->status = 1;
    //                 // }
    //                 $order->save();
    //                 // $dashboard = new Dashboard();
    //                 // $dashboard->order_id = $orders->id;
    //                 // $dashboard->rider_id = $riders->id;
    //                 // $dashboard->status = 1;
    //                 // $dashboard->save();
    //                 if ($availableCapacity == 0) {
    //                     break;
    //                 }

    //             } else {
    //                 // echo "in else :";
    //                 // echo "<pre> Ava cap < :";
    //                 // print_r($availableCapacity);
    //                 // echo "</pre>";
    //                 //calculate
    //                 $orderQuantity = $orderQuantity - $availableCapacity;
    //                 $availableCapacity = 0;
    //                 // echo "<pre> rideronhand :";
    //                 // print_r($orderQuantity);
    //                 // echo "</pre>";
    //                 //update rider capacity
    //                 $rider = Rider::findOrFail($riders->id);
    //                 $rider->available_capacity = 0;
    //                 $rider->save();
    //                 //update order status
    //                 $order = Order::findOrFail($orders->id);
    //                 $order->qty = $orderQuantity;
    //                 if ($orderQuantity === 0) {
    //                     $order->status = 1;
    //                     // $dashboard->order_id = $orders->id;
    //                     // $dashboard->rider_id = $riders->id;
    //                     // $dashboard->status = 1;
    //                     // $dashboard->save();
    //                 }
    //                 $order->save();
    //                 if ($orderQuantity == 0 || $availableCapacity == 0) {
    //                     break;
    //                 }
    //             }
    //         }
    //         // foreach ($availableRiders as $rider) {
    //         //     $rideronHand = 0;
    //         //     $availableCapacity = $rider->available_capacity;
    //         //     foreach ($pendingOrders as $order) {
    //         //         $orderQuantity = $orders->qty;
    //         //         echo "<pre> orderQuantity :";
    //         //         print_r($orderQuantity);
    //         //         echo "</pre>";
    //         //         if ($availableCapacity === 0) {
    //         //             break;
    //         //         }
    //         //         //if capacity is >= qty then update the order table status and update rider capacity
    //         //         else if ($availableCapacity >= $orderQuantity) {
    //         //             echo "<pre> Ava cap > :";
    //         //             print_r($availableCapacity);
    //         //             echo "</pre>";
    //         //             //calculate
    //         //             $rideronHand = $availableCapacity - $orderQuantity;
    //         //             echo "<pre> rideronhand :";
    //         //             print_r($rideronHand);
    //         //             echo "</pre>";
    //         //             // dd($rideronHand);
    //         //             //update rider capacity
    //         //             $rider = Rider::findOrFail($rider->id);
    //         //             $rider->available_capacity = $rideronHand;
    //         //             $rider->save();
    //         //             //update order status
    //         //             $order = Order::findOrFail($order->id);
    //         //             $orders->qty = 0;
    //         //             if ($orders->qty === 0) {
    //         //                 $order->status = 1;
    //         //             }
    //         //             $order->save();
    //         //             //assign rider and update status
    //         //             // $dashboard = new Dashboard();
    //         //             // $dashboard->order_id = $order->id;
    //         //             // $dashboard->rider_id = $rider->id;
    //         //             // if ($orderQuantity > 0) {
    //         //             //     $dashboard->status = 0;
    //         //             // } else {
    //         //             //     $dashboard->status = 1;
    //         //             // }
    //         //             // $dashboard->save();
    //         //         } else {
    //         //             echo "<pre> Ava cap < :";
    //         //             print_r($availableCapacity);
    //         //             echo "</pre>";
    //         //             //calculate
    //         //             $rideronHand = $orderQuantity - $availableCapacity;
    //         //             echo "<pre> rideronhand :";
    //         //             print_r($rideronHand);
    //         //             echo "</pre>";
    //         //             //update rider capacity
    //         //             $rider = Rider::findOrFail($rider->id);
    //         //             $rider->available_capacity = 0;
    //         //             $rider->save();
    //         //             //update order status
    //         //             $order = Order::findOrFail($order->id);
    //         //             $orders->qty = $rideronHand;
    //         //             if ($orderQuantity === 0) {
    //         //                 $order->status = 1;
    //         //             }
    //         //             $order->save();
    //         //         }
    //         //     }
    //         // }
    //     }
    // }

    // public function complete_Order(Request $request)
    // {
    //     $selected_ids = $request->input('ids');
    //     dd($selected_ids);exit;
    //     // echo "<br>" . $selected_ids . "<br>";
    //     // exit;
    //     // total riders count
    //     $totalRiders = Rider::select('id')->where('available_capacity', '>', '0')->get()->count();
    //     if (!empty($totalRiders)) {
    //         for ($i = 1; $i <= $totalRiders; $i++) {
    //             echo "in rider for loop iteration#: " . $i;
    //             // db call to get first available rider
    //             $riders = DB::table('riders')->where('available_capacity', '>', '0')->get(['id', 'total_capacity', 'available_capacity'])->first();
    //             $availableCapacity = $riders->available_capacity;
    //             foreach ($selected_ids as $selected_id) {
    //                 echo "in selected_ids for each loop";
    //                 $pending_orders = Order::findorFail($selected_id)->where('qty', '>', '0');
    //                 $qty = $pending_orders->qty;
    //                 if ($availableCapacity >= $qty) {
    //                     $availableCapacity = $availableCapacity - $qty;
    //                     //update rider capacity
    //                     $updateRider = Rider::findOrFail($riders->id);
    //                     $updateRider->available_capacity = $availableCapacity;
    //                     $updateRider->save();
    //                     //update order status
    //                     $updateOrder = Order::findOrFail($selected_id);
    //                     $updateOrder->status = 1;
    //                     $updateOrder->save();
    //                     //update dashboard
    //                     $dashboard = Dashboard::all();
    //                     $dashboard->order_id = $selected_id;
    //                     $dashboard->rider_id = $riders->id;
    //                     $dashboard->status = 1;
    //                     $dashboard->save();
    //                 } else {
    //                     $qty = $qty - $availableCapacity;
    //                     //update order qty
    //                     $updateOrder = Order::findOrFail($selected_id);
    //                     $updateOrder->qty = $qty;
    //                     if ($qty === 0) {
    //                         $updateOrder->status = 1;
    //                     }
    //                     $updateOrder->save();
    //                     //update dashboard
    //                     $dashboard = Dashboard::all();
    //                     $dashboard->order_id = $selected_id;
    //                     $dashboard->rider_id = $riders->id;
    //                     if ($qty === 0) {
    //                         $dashboard->status = 1;
    //                     } else {
    //                         $dashboard->status = 0;
    //                     }
    //                     $dashboard->save();
    //                     //update rider capacity
    //                     $updateRider = Rider::findOrFail($riders->id);
    //                     $updateRider->available_capacity = 0;
    //                     $updateRider->save();
    //                 }
    //             }

    //         }
    //     }
    //     else {
    //         toast(__('No Riders Available!'), 'error', 'top')->position('top-end')->width('400');
    //         return redirect()->back()->route('order.order-complete');
    //         // return redirect()->back();
    //     }
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $orders = Order::findOrFail($id);
        $pizzas = Pizza::all();
        return view('order.edit', compact('orders', 'pizzas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $request->updateOrder($request, $id);
        toast(__('Updated Successfully!'), 'success', 'top')->position('top-end')->width('400');
        return redirect()->route('order.order-delivery.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $order = Order::findOrFail($id);
            $order->delete();
            return response(['status' => 'success', 'message' => __('Deleted Successfully')]);
        } catch (\Throwable $th) {
            return response(['status' => 'error', 'message' => __('Something went wrong!')]);
        }
    }
}
