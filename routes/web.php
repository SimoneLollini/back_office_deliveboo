<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\RestaurantController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\PlateController;
use App\Http\Controllers\Admin\OrderController;

use App\Http\Controllers\Admin\DashboardController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/restaurants', RestaurantController::class);
    Route::resource('/types', TypeController::class);
    Route::resource('/plates', PlateController::class);
    Route::resource('/orders', OrderController::class);
});

require __DIR__ . '/auth.php';
