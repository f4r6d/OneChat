<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\MessageController;
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
    return view('chat.index');
})->name('home')->middleware('auth');

Route::prefix('auth')->namespace('Auth')->group(function(){
    Route::get('register', [RegisterController::class, 'showRegisterationForm'])->name('register.form');
    Route::post('register', [RegisterController::class, 'register'])->name('register');
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login.form');
    Route::post('login', [LoginController::class, 'login'])->name('login');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});

Route::get('messages', [MessageController::class, 'index'])->name('messages.index');
Route::post('messages', [MessageController::class, 'store'])->name('messages.store');


