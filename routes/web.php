<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\BillTypeController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DebtController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ProductController;
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

    Route::get('/bill-type', [BillTypeController::class, 'index'])->name('bill-type');
    Route::get('bill-type/create', [BillTypeController::class, 'create'])->name('create-bill-type');
    Route::post('bill-type/store', [BillTypeController::class, 'store'])->name('store-bill-type');


    Route::get('/branch', [BranchController::class, 'index'])->name('branch');

    Route::get('/company', [CompanyController::class, 'index'])->name('company');

    Route::get('/income', [IncomeController::class, 'index'])->name('income');

    Route::get('/expense', [ExpenseController::class, 'index'])->name('expense');

    Route::get('/bill', [BillController::class, 'index'])->name('bill');
    Route::get('bill/create', [BillController::class, 'create'])->name('create-bill');
    Route::post('bill/store', [BillController::class, 'store'])->name('store-bill');
    Route::get('bill/edit/{id}', [BillController::class, 'edit'])->name('edit-bill');
    Route::put('bill/update/{id}', [BillController::class, 'update'])->name('update-bill');


    Route::get('/debt', [DebtController::class, 'index'])->name('debt');

    Route::get('/product/create/{billId}', [ProductController::class, 'create'])->name('product-create');
    Route::post('/product/store/{billId}', [ProductController::class, 'store'])->name('product-store');
    Route::get('/product/edit/{id}/{billId}', [ProductController::class, 'edit'])->name('product-edit');
    Route::put('/product/update/{id}/{billId}', [ProductController::class, 'update'])->name('product-update');
    Route::delete('/product/destroy/{id}/{billId}', [ProductController::class, 'destroy'])->name('product-destroy');

    Route::get('/{branchId}', [DashboardController::class, 'keepBranch'])->name('keepBranch');
});
