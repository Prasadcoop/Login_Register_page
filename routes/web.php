<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
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

Route::get('/login', [MainController::class,'login']);
Route::get('/registration', [MainController::class,'registration']);

Route::post('/register-user',[MainController::class,'registerUser'])->name('register-user');
Route::post('/login-user',[MainController::class,'loginUser'])->name('login-user');

Route::get('/dashboard',[MainController::class,'dashboard']);
Route::get('/logout',[MainController::class,'logout']);