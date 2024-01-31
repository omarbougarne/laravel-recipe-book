<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
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

Route::get('/', [WelcomeController::class,'index']);
Route::get('/add', [WelcomeController::class, 'showAddForm'])->name('add.form');
route::post('add_recipe', [WelcomeController::class,'add_recipe']);
route::get('recipe', [WelcomeController::class,'show_recipe']);
route::get('/delete/{id}', [WelcomeController::class, 'delete_recipe'])->name('delete_recipe');
route::get('update_recipe/{id}', [WelcomeController::class,'update_recipe'])->name('update_recipe');
route::post('edit_recipe/{id}', [WelcomeController::class,'edit_recipe']);

































