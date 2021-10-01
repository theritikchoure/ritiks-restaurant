<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; 
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FoodController;

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

Route::get('/', [HomeController::class, 'index'])->name('index');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// require __DIR__.'/auth.php';

Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login.get');
Route::post('admin/login', [AdminController::class, 'login_check'])->name('admin.login.post');

Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

Route::get('redirects', [HomeController::class, 'redirects'])->name('redirects');

Route::get('/users', [AdminController::class, 'user']);

Route::get('/delete/{id}', [AdminController::class, 'user_destroy']);

Route::get('/food-menu', [AdminController::class, 'food']);
Route::post('/food-menu', [FoodController::class, 'create_food']);
Route::get('/delete-food/{id}', [FoodController::class, 'delete_food']);
Route::get('/edit-food/{id}', [FoodController::class, 'edit_food']);
Route::put('/edit-food/{id}', [FoodController::class, 'edit_food1']);


Route::post('/', [HomeController::class, 'reservation']);
Route::get('/reservation', [AdminController::class, 'show_reservation']);

Route::get('/view-chefs', [AdminController::class, 'view_chefs']);
Route::post('/view-chefs', [AdminController::class, 'upload_chefs']);
Route::get('/edit-chef/{id}', [AdminController::class, 'edit_chef']);
Route::put('/edit-chef/{id}', [AdminController::class, 'update_chef']);
Route::get('/delete-chef/{id}', [AdminController::class, 'delete_chef']);