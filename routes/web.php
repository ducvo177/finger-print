<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
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


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/scan', [DashboardController::class, 'scan'])->name('scan')->middleware('auth');
Route::post('/scan/check', [DashboardController::class, 'check'])->name('scan-check')->middleware('auth');
Route::get('/admin', [DashboardController::class, 'admin'])->name('admin')->middleware('auth');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/login/check', [LoginController::class, 'check'])->name('login-check');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/register/store', [RegisterController::class, 'store'])->name('register-store');
Route::get('/user',[DashboardController::class,'user'])->name('user');
Route::post('/user/update',[DashboardController::class,'userUpdate'])->name('user-update');
Route::get('/user/scan',[DashboardController::class,'userScan'])->name('user-scan');
Route::post('/user/scan/save', [DashboardController::class, 'userScanSave'])->name('user-scan-save');