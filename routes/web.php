<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::post('/register/store', [RegisterController::class, 'store'])->name('register-store');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/login/check', [LoginController::class, 'check'])->name('login-check');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
