<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DirectRootController;
use App\Http\Controllers\Merchant\MerchantController;
use App\Http\Controllers\Product\CategoryProductController;
use App\Http\Controllers\Role\RolesController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

Route::get('/', [DirectRootController::class, 'index'])->name('rootWeb');
/**
 * [Route Auth]
 */
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
/**
 * [End Route Auth]
 */

/**
 * [Route Locale]
 */

Route::get('locale/{locale}', function ($locale) {
    Session::put('locale', $locale);
    return redirect()->back();
});
/**
 * [End Route Locale]
 */

Route::middleware(['auth:sanctum', 'web'])->group(function () {
    Route::get('/dashboard', [DirectRootController::class, 'dashboard'])->name('dashboard');
    /**
     * [Route Merchant Profile]
     */
    Route::controller(MerchantController::class)->group(function () {
        Route::get('merchant-profile', 'index')->name('merchant-profile');
        Route::post('merchant-profile/save', 'createAndUpdate')->name('merchant-save');
    });
    /**
     * [End Route Merchant Profile]
     */
    /**
     * [Route Roles Management]
     */
    Route::resource('roles-management', RolesController::class)->except(['show', 'edit', 'create']);
    /**
     * [End Route Roles Management]
     */
    /**
     * [Route User Management]
     */
    Route::get('users-management/deleteImg', [UserController::class, 'deleteImage']);
    Route::resource('users-management', UserController::class)->except(['show', 'edit', 'create']);
    /**
     * [End Route User Management]
     */
    /**
     * [Route Product Category]
     */
    Route::resource('product-category', CategoryProductController::class)->except(['show', 'edit', 'create']);
    /**
     * [End Route Product Category]
     */
});
