<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CityController;

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


Route::resource('positions', PositionController::class);
Route::resource('employees', EmployeeController::class);
Route::resource('countries', CountryController::class);
Route::resource('cities', CityController::class);
Route::get('/cities-by-country/{country}', [CityController::class, 'getCitiesByCountry']);