<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\ProductController;
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

Route::get('/categories',[CategoryController::class,'getall']);

Route::get('/products',[ProductController::class,'getall']);

Route::get('/CategoryProducts/{categoryid}',[ProductController::class,'getCategoryProduct']);

Route::get('/AcceptOrder/{orderid}',[OrderController::class,'AcceptOrder']);

Route::get('/RejectOrder/{orderid}',[OrderController::class,'RejectOrder']);

Route::get('/OrderDetail/{orderid}',[OrderDetailController::class,'getOrderDetail']);

Route::post('/MakeOrder/{clientid}',[OrderDetailController::class,'MakeOrder']);
