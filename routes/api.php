<?php

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::resource('items', "ItemController")->only(['show']);
Route::put('/items/{item}/stocks/in', 'StockInController@stockIn')
    ->name('stockIn');
Route::put('/items/{item}/stocks/out', 'StockOutController@stockOut')
    ->name('stockOut');
