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
Route::post('/reservation/query', [AdminController::class, 'reservationQuery'])->name('reservation.query');
Route::get('/cart', [AdminController::class, 'cartHome'])->name('cart');


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

Route::get('/users', [AdminController::class, 'user']);
Route::get('/foodmenu', [AdminController::class, 'foodmenu'])->name('foodmenu');
Route::post('/uploadfood', [AdminController::class, 'uploadfood']);
Route::get('/deleteuser/{id}', [AdminController::class, 'deleteuser']);

Route::get('/delete/food/{id}', [AdminController::class, 'deleteFood'])->name('delete.food');
Route::get('/update/food/{id}', [AdminController::class, 'updateFood'])->name('food.update');
Route::post('/updatefood/{id}', [AdminController::class, 'updateFoodData'])->name('food.update.data');

Route::get('/reservation', [AdminController::class, 'reservation'])->name('reservation');

Route::get('/chefs/main', [AdminController::class, 'chefs'])->name('chefs');
Route::post('/chef/upload', [AdminController::class, 'chefUpload'])->name('chef.upload');
Route::get('/chef/delete/{id}', [AdminController::class, 'chefDelete'])->name('chefs.delete');
Route::get('/chef/update/{id}', [AdminController::class, 'chefUpdate'])->name('chef.update');
Route::post('/chef/update/date/{id}', [AdminController::class, 'chefUpdateData'])->name('chef.update.data');

Route::post('/add-cart', [AdminController::class, 'addCart'])->name('addcart');
Route::get('/cart/delete/{id}', [AdminController::class, 'cartDelete'])->name('cart.delete');

Route::post('/order/conform', [AdminController::class, 'orderConform'])->name('order.conform');

Route::get('/order', [AdminController::class, 'orderFetch'])->name('order');

});

