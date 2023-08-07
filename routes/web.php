<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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




Route::get('/',[HomeController::class, 'index']);
Route::get('/redirects',[HomeController::class, 'redirects']);
Route::get('/users', [AdminController::class, 'user']);
Route::get('/foodmenu', [AdminController::class, 'foodmenu'])->name('foodmenu');
Route::post('/uploadfood', [AdminController::class, 'uploadfood']);
Route::get('/deleteuser/{id}', [AdminController::class, 'deleteuser']);

Route::get('/delete/food/{id}', [AdminController::class, 'deleteFood'])->name('delete.food');
Route::get('/update/food/{id}', [AdminController::class, 'updateFood'])->name('food.update');
Route::post('/updatefood/{id}', [AdminController::class, 'updateFoodData'])->name('food.update.data');

Route::get('/reservation', [AdminController::class, 'reservation'])->name('reservation');
Route::post('/reservation/query', [AdminController::class, 'reservationQuery'])->name('reservation.query');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
