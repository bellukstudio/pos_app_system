<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DirectRootController;
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


Route::middleware(['auth:sanctum', 'web'])->group(function () {
    Route::get('/dashboard', [DirectRootController::class, 'dashboard'])->name('dashboard');
});
