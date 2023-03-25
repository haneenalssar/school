<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\RoomController;
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


Route::prefix('cms/admin')->group(function(){

    Route::view('','cms.parent');

Route::resource('cities',CityController::class);
Route::post('update_cities/{id}' , [CityController::class , 'update'])->name('update_cities');

Route::resource('grades',GradeController::class);
Route::post('update_grades/{id}' , [GradeController::class , 'update'])->name('update_grades');


Route::resource('rooms',RoomController::class);
Route::post('update_rooms/{id}' , [RoomController::class , 'update'])->name('update_rooms');

Route::resource('admins',AdminController::class);
Route::post('update_admins/{id}' , [AdminController::class , 'update'])->name('update_admins');
});
