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

    public function complete_Order(Request $request)
    {
        //get all orders
        $orders = Order::select(['id', 'qty', 'status'])->where('status', '===', '0')->where('qty', '>', '0')->get();
        //get all riders
        $riders = Rider::select(['id', 'capacity'])->where('capacity', '>', '0')->get();
        //all orders in this array
        $orderArray = array();
        //all riders on this array
        $riderArray = array();
        //all ids
        $idArray = array();
        //end result
        $result = array();
        //assign value to orderArray
        foreach ($orders as $order) {
            $orderArray[$order->id] = $order->qty;
        }
        //assign value to riderArray
        foreach ($riders as $rider) {
            $riderArray[$rider->id] = $rider->capacity;
        }
        //max capacity from rider array
        $maxCap = max($riderArray);
        //tempQty var
        $tempQty = 0;
        //total order array count
        $totalOrderArray = count($orderArray);
        //cout var
        $count = 0;
        //for each order
        foreach ($orderArray as $orderkey => $orderValue) {
            //inc count
            $count += 1;
            //add to idArray
            array_push($idArray, $orderkey);
            // add to tempQty value
            $tempQty += $orderValue; //2//4//2//1//3
            // check if tempQty > maxCapacity
            if ($tempQty > $maxCap) {
                //pop last id
                $pop = array_pop($idArray);
                //calculate prev qty
                $prevQty = $tempQty - $orderValue; //9
                //find rider id and name and assign it to result var
                $rider_id = array_search($maxCap, $riderArray);
                $findName = Rider::select('rider_name', 'capacity')->where('id', $rider_id)->get();
                //assign to result array
                foreach ($findName as $key => $val) {
                    $cap = $val->capacity - $prevQty;
                    $result[$rider_id] = [
                        'rider_id' => $rider_id,
                        'rider_name' => $val->rider_name,
                        'order_id' => $idArray,
                        'capacity' => $val->capacity,
                        'qty_assigned' => $prevQty,
                        'remaining' => $cap,
                    ];
                }
                //unset id Array
                unset($idArray);
                $idArray = array();
                $idArray[] = $pop;
                //set tempQty for next iteration
                $tempQty = $orderValue; //3
                //if this is the last order
                if ($totalOrderArray == $count && $tempQty > 0) {
                    //for each rider
                    foreach ($riderArray as $riderkey => $ridervalue) {
                        //if there is an exact match
                        if ($tempQty == $ridervalue) {
                            //findName of the rider
                            $findName = Rider::select('rider_name', 'capacity')->where('id', $riderkey)->get();
                            //assign to result array
                            foreach ($findName as $key => $value) {
                                //calculate remaining capacity
                                $cap = $value->capacity - $tempQty;
                                $result[$riderkey] = [
                                    'rider_id' => $riderkey,
                                    'rider_name' => $value->rider_name,
                                    'order_id' => $idArray,
                                    'capacity' => $value->capacity,
                                    'qty_assigned' => $tempQty,
                                    'remaining' => $cap,
                                ];
                            }
                            //unset id Array
                            unset($idArray);
                            $idArray = array();
                        }
                    }
                }
            } else {
                //wait for next order qty
                // if qty == max capacity
                if ($tempQty == $maxCap) {
                    //assign the max cap rider
                    $rider_id = array_search($maxCap, $riderArray);
                    //findName of the rider
                    $findName = Rider::select('rider_name', 'capacity')->where('id', $riderkey)->get();
                    //assign to result array
                    foreach ($findName as $key => $value) {
                        //calculate remaining capacity
                        $cap = $value->capacity - $tempQty;
                        $result[$riderkey] = [
                            'rider_id' => $riderkey,
                            'rider_name' => $value->rider_name,
                            'order_id' => $idArray,
                            'capacity' => $value->capacity,
                            'qty_assigned' => $tempQty,
                            'remaining' => $cap,
                        ];
                    }
                }
            }
        }
        echo "<br>";
        dd($result);
    }

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
