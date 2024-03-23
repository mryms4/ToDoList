<?php

use App\Http\Controllers\todoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/todos','App\Http\Controllers\todoController@todos');
Route::get('/create','App\Http\Controllers\todoController@create');
Route::get('/edit','App\Http\Controllers\todoController@edit');
Route::post('/store','App\Http\Controllers\todoController@store');