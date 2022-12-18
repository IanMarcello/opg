<?php

use Illuminate\Http\Request;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/v1/orders', [OrderController::class, 'index'])->name('api.orders.index');
Route::post('/v1/orders/create', [OrderController::class, 'create'])->name('api.orders.create');
Route::get('/v1/order/{orderId}', [OrderController::class, 'show'])->name('api.orders.show');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
