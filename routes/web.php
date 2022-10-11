<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

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

Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('authManager');
Route::post('/signin', [AuthController::class, 'signin'])->name('signin')->middleware('authManager');
Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('create-admin', [AdminController::class, 'create'])->name('create-admin');
    Route::post('store-admin', [AdminController::class, 'store'])->name('store-admin');
    Route::get('edit-admin/{id}', [AdminController::class, 'edit'])->name('edit-admin');
    Route::put('update-admin/{id}', [AdminController::class, 'update'])->name('update-admin');
    Route::delete('delete-admin/{id}', [AdminController::class, 'destroy'])->name('delete-admin');
});
