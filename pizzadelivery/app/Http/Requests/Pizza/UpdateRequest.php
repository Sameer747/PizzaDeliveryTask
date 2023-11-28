<?php

namespace App\Http\Requests\Pizza;

use App\Models\Pizza;
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
        $pizzaId = request()->segment(2);
        return [
            'name' => ['required', 'max:255', 'unique:pizzas,name,' . $pizzaId],
            'category' => ['required', 'max:255', 'unique:pizzas,category,' . $pizzaId],
        ];
    }
    public function pizzaUpdate(Request $request, string $id)
    {
        $pizza = Pizza::findOrFail($id);
        $pizza->name = $request->name;
        $pizza->category = $request->category;
        $pizza->save();
    }
}
