<?php

use App\Http\Controllers\ItemController;
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

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

Route::get('/', 'HomeController@index')->name('home'); 
Route::get('/about', 'AboutController@index')->name('about'); 
Route::resource('/users', 'UserController')->only(['index']); 
Route::resource('/items', 'ItemController')->only(['index', 'store', 'update','destroy']);
Route::resource('/stock-in', 'StockInController')->only(['index']);


Route::view('customers', 'pages.customers');

Auth::routes();

