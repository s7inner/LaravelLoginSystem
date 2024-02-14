<?php

use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

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

//For LoginController and welcome.blade.php, login.blade.php
Route::view('/login', 'login')->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::view('/logout', 'welcome')->name('logout');
Route::post('/logout', [LoginController::class, 'logout']);

//For AdminController and dashboard.blade.php
Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/dashboard', [AdminController::class, 'getAllUsers'])->name('dashboard');
    Route::delete('/dashboard/user/{id}', [AdminController::class, 'deleteUser'])->name('user.delete');
});
