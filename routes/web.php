<?php

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

Route::view('/login', 'login')->name('login');
Route::post('/login', [LoginController::class, 'login']);
//Route::view('/dashboard', 'dashboard')->name('dashboard');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
});

Route::view('/logout', 'welcome')->name('logout');
Route::post('/logout', [LoginController::class, 'logout']);
