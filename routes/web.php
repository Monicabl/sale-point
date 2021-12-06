<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SaleController;
use Illuminate\Support\Facades\Route;

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

Route::get('admin/sales/{id}/add-customer', [SaleController::class, 'addCustomer']);

Route::post('admin/sales/{id}/add-customer', [SaleController::class, 'linkCustomer']);

Route::resource('admin/sales', SaleController::class);
Route::resource('admin/products', ProductController::class);