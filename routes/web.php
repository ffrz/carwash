<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CashAccountController;
use App\Http\Controllers\Admin\CashTransactionCategoryController;
use App\Http\Controllers\Admin\CashTransactionController;
use App\Http\Controllers\Admin\CostCategoryController;
use App\Http\Controllers\Admin\CostController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserGroupController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\OnlyAdmin;
use App\Http\Middleware\OnlyGuest;
use Illuminate\Support\Facades\Auth;
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

/// Tambahkan route untuk akses publik disini
Route::get('/', function () {
    // if ($user->role_id == 1) {
    //     return redirect(url('dashboard'));
    // } else if ($user->role_id == 2) {
    //     return redirect(url('profile'));
    // }
    return view('welcome');
});

Route::redirect('/admin', '/admin/dashboard');

Route::middleware([OnlyGuest::class])->group(function () {
    Route::get('admin/login', [AuthController::class, 'login'])->name('login');
    Route::post('admin/login', [AuthController::class, 'authenticate']);
});

Route::middleware([Authenticate::class, OnlyAdmin::class])->prefix('admin')->group(function () {
    Route::get('logout', [AuthController::class, 'logout']);
    /// Tambahkan route untuk akses admin disini
    Route::get('dashboard', [DashboardController::class, 'index']);

    Route::controller(SettingController::class)->prefix('settings')->group(function () {
        Route::get('', 'edit');
        Route::post('save', 'save');
    });

    // Route::controller(UserGroupController::class)->prefix('user-groups')->group(function () {
    //     Route::get('', 'index');
    //     Route::match(['get', 'post'], 'edit/{id}', 'edit');
    //     Route::get('delete/{id}', 'delete');
    // });

    Route::controller(UserController::class)->prefix('users')->group(function () {
        Route::get('', 'index');
        Route::match(['get', 'post'], 'edit/{id}', 'edit');
        Route::match(['get', 'post'], 'delete/{id}', 'delete');
        Route::match(['get', 'post'], 'profile', 'profile');
    });

    // Route::controller(CostCategoryController::class)->prefix('cost-categories')->group(function () {
    //     Route::get('', 'index');
    //     Route::match(['get', 'post'], 'edit/{id}', 'edit');
    //     Route::get('delete/{id}', 'delete');
    // });

    // Route::controller(CostController::class)->prefix('costs')->group(function () {
    //     Route::get('', 'index');
    //     Route::match(['get', 'post'], 'edit/{id}', 'edit');
    //     Route::get('delete/{id}', 'delete');
    // });

    // Route::controller(CashAccountController::class)->prefix('cash-accounts')->group(function () {
    //     Route::get('', 'index');
    //     Route::match(['get', 'post'], 'edit/{id}', 'edit');
    //     Route::get('delete/{id}', 'delete');
    // });

    // Route::controller(CashTransactionCategoryController::class)->prefix('cash-transaction-categories')->group(function () {
    //     Route::get('', 'index');
    //     Route::match(['get', 'post'], 'edit/{id}', 'edit');
    //     Route::get('delete/{id}', 'delete');
    // });

    // Route::controller(CashTransactionController::class)->prefix('cash-transactions')->group(function () {
    //     Route::get('', 'index');
    //     Route::match(['get', 'post'], 'edit/{id}', 'edit');
    //     Route::get('delete/{id}', 'delete');
    // });

    Route::controller(ProductCategoryController::class)->prefix('product-categories')->group(function () {
        Route::get('', 'index');
        Route::match(['get', 'post'], 'edit/{id}', 'edit');
        Route::get('delete/{id}', 'delete');
    });

    Route::controller(ProductController::class)->prefix('products')->group(function () {
        Route::get('', 'index');
        Route::match(['get', 'post'], 'edit/{id}', 'edit');
        Route::get('delete/{id}', 'delete');
    });

    // Route::controller(SupplierController::class)->prefix('suppliers')->group(function () {
    //     Route::get('', 'index');
    //     Route::match(['get', 'post'], 'edit/{id}', 'edit');
    //     Route::get('delete/{id}', 'delete');
    //     Route::get('view/{id}', 'view');
    // });

    Route::controller(CustomerController::class)->prefix('customers')->group(function () {
        Route::get('', 'index');
        Route::match(['get', 'post'], 'edit/{id}', 'edit');
        Route::get('delete/{id}', 'delete');
        Route::get('view/{id}', 'view');
    });
});
