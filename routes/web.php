<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
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

Route::get('/login', [LoginController::class, 'index'])
    ->middleware('guest')
    ->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout']);

Route::middleware('auth')->group(function () {
    Route::get('/admin', [LoginController::class, 'admin'])->middleware('userakses:admin');
    Route::get('/pelanggan', [LoginController::class, 'pelanggan'])->middleware('userakses:pelanggan');
    Route::get('/owner', [LoginController::class, 'owner'])->middleware('userakses:owner');
    Route::get('/usercheck', [LoginController::class, 'usercheck']);
    Route::resource('/user', UserController::class);
});