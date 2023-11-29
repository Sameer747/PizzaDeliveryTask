<?php

namespace App\Http\Requests\Order;

use App\Models\Order;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateRequest extends FormRequest
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
    public function updateOrder(Request $request, string $id)
    {
        $order = Order::findOrFail($id);
        $order->userName = $request->user_name;
        $order->phone = $request->phone;
        $order->pizza = $request->name;
        if ($request->category === 1) {
            $order->category = 'Thin Crust';
        } else {
            $order->category = 'Stuffed Crust';
        }
        $order->qty = $request->qty;
        $order->price = 10 * $request->qty;
        $order->status = $request->status;
        $order->save();
    }
}
