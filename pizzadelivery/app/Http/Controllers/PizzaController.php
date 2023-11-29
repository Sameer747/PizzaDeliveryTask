<?php

namespace App\Http\Controllers;

use App\Http\Requests\Pizza\StoreRequest;
use App\Http\Requests\Pizza\UpdateRequest;
use App\Models\Pizza;
use Illuminate\Http\Request;


class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pizzas = Pizza::all();
        return view('pizza-category.index', compact('pizzas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pizza-category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $request->pizzaStore($request);
        toast(__('Created Successfully!'), 'success', 'top')->position('top-end')->width('400');
        return redirect()->route('pizza.pizza-delivery.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pizzas = Pizza::findOrFail($id);
        return view('category.edit', compact('pizzas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $request->pizzaUpdate($request, $id);
        toast(__('Updated Successfully!'), 'success', 'top')->position('top-end')->width('400');
        return redirect()->route('pizza.pizza-delivery.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $pizza = Pizza::findOrFail($id);
            $pizza->delete();
            return response(['status' => 'success', 'message' => __('Deleted Successfully')]);
        } catch (\Throwable $th) {
            return response(['status' => 'error', 'message' => __('Something went wrong!')]);
        }
    }
}
