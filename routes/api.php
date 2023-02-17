<?php

use App\Http\Controllers\API\RestaurantController;
use App\Http\Controllers\API\TypeController;
use App\Http\Controllers\API\PlateController;
use App\Http\Controllers\API\OrderController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/restaurants', [RestaurantController::class, 'index']);

Route::get('/restaurants/{restaurant:id}', [RestaurantController::class, 'show']);

Route::get('/restaurants/types/{type:name}', [RestaurantController::class, 'types']);

Route::get('/types', [TypeController::class, 'index']);

Route::get('/plates', [PlateController::class, 'index']);

Route::post('/order', [OrderController::class, 'store']);
