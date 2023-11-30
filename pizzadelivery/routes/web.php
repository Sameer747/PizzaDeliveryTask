<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\PizzaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// dashboard
Route::get('/', function () {
    return view('dashboard.index');
})->name('dashboard');
// pizza resource route
Route::group(['as' => 'pizza.'], function () {
    Route::resource('pizza-delivery', PizzaController::class);
});
// order resource route
Route::group(['as' => 'order.'], function () {
    Route::resource('order-delivery', OrderController::class);
});


