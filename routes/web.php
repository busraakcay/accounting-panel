<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CompanyController;
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
    Route::get('admin/create', [AdminController::class, 'create'])->name('create-admin');
    Route::post('admin/store', [AdminController::class, 'store'])->name('store-admin');
    Route::get('admin/edit/{id}', [AdminController::class, 'edit'])->name('edit-admin');
    Route::put('admin/update/{id}', [AdminController::class, 'update'])->name('update-admin');
    Route::delete('admin/delete/{id}', [AdminController::class, 'destroy'])->name('delete-admin');

    Route::get('/branch', [BranchController::class, 'index'])->name('branch');
    Route::get('branch/create', [BranchController::class, 'create'])->name('create-branch');
    Route::post('branch/store', [BranchController::class, 'store'])->name('store-branch');
    Route::get('branch/edit/{id}', [BranchController::class, 'edit'])->name('edit-branch');
    Route::put('branch/update/{id}', [BranchController::class, 'update'])->name('update-branch');
    Route::delete('branch/delete/{id}', [BranchController::class, 'destroy'])->name('delete-branch');

    Route::get('/company', [CompanyController::class, 'index'])->name('company');
    Route::get('company/create', [CompanyController::class, 'create'])->name('create-company');
    Route::post('company/store', [CompanyController::class, 'store'])->name('store-company');
    Route::get('company/edit/{id}', [CompanyController::class, 'edit'])->name('edit-company');
    Route::put('company/update/{id}', [CompanyController::class, 'update'])->name('update-company');
    Route::delete('company/delete/{id}', [CompanyController::class, 'destroy'])->name('delete-company');


});
