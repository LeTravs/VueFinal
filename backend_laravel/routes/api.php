<?php
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SupplierController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
//Customer
Route::get('/customers', [CustomerController::class, 'index']);
Route::get('/customers/{customer}', [CustomerController::class, 'show']);
Route::delete('/customers/{customer}', [CustomerController::class, 'destroy']);
//Sale
Route::get('/sales', [SaleController::class, 'index']);
Route::get('/sales/{sale}', [SaleController::class, 'show']);
Route::delete('/sales/{sale}', [SaleController::class, 'destroy']);
//Suppliers
Route::get('/suppliers', [SupplierController::class, 'index']);
Route::get('/suppliers/{supplier}', [SupplierController::class, 'show']);
Route::delete('/customers/{customer}', [SupplierController::class, 'destroy']);


