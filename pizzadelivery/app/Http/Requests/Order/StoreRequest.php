<?php

namespace App\Http\Requests\Order;

use App\Models\Order;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "user_name" => ['required'],
            "phone" => ['required'],
            "name" => ['required'],
            "category" => ['required'],
            'qty' => ['required'],
            'status' => ['required']
        ];
    }
    public function createOrder(Request $request)
    {
        $order = new Order;
        $order->userName = $request->user_name;
        $order->phone = $request->phone;
        $order->pizza = $request->name;
        if ($request->category == 1) {
            $order->category = 'Thin Crust';
        } else {
            $order->category = 'Stuffed Crust';
        }
        $order->qty = $request->qty;
        $order->price = $request->price * $request->qty;
        $order->status = $request->status;
        $order->save();
    }
}
