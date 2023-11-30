<?php

namespace App\Http\Requests\Rider;

use App\Models\Rider;
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
        $riderId = request()->segment(2);
        // dd($riderId);exit;
        return [
            'rider_name' => ['required'],
            'phone' => ['required', 'unique:riders,phone,' . $riderId],
            'total_capacity' => ['required'],
            'available_capacity' => ['required'],
        ];
    }
    public function updateRider(Request $request, string $id)
    {
        $rider = Rider::findOrFail($id);
        $rider->rider_name = $request->rider_name;
        $rider->phone = $request->phone;
        $rider->total_capacity = $request->total_capacity;
        $rider->available_capacity = $request->available_capacity;
        $rider->save();
    }
}
