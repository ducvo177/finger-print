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



//Authentication
Route::post('/login/check', [LoginController::class, 'check'])->name('login-check');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register/store', [RegisterController::class, 'store'])->name('register-store');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//User route
Route::get('/admin', [DashboardController::class, 'admin'])->name('admin')->middleware('auth');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/scan', [DashboardController::class, 'scan'])->name('scan')->middleware('auth');
Route::post('/scan/check', [DashboardController::class, 'check'])->name('scan-check')->middleware('auth');
Route::get('/user',[DashboardController::class,'user'])->name('user')->middleware('auth');
Route::post('/user/update',[DashboardController::class,'userUpdate'])->name('user-update')->middleware('auth');
Route::get('/user/scan',[DashboardController::class,'userScan'])->name('user-scan')->middleware('auth');
Route::get('/user/delete',[DashboardController::class,'userDelete'])->name('user-delete')->middleware('auth');
Route::post('/user/scan/save', [DashboardController::class, 'userScanSave'])->name('user-scan-save')->middleware('auth');
Route::post('/fingerprints/check',[DashboardController::class,'serverCheck'])->name('server-check');
