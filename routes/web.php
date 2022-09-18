<?php

use App\Http\Controllers\UserController;
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


Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('layouts.app');
    })->name('home');

    Route::prefix('users')->group(function () {
        Route::controller(UserController::class)->group(function () {
            Route::get('/password', 'changePasswordForm')->name('users.change-password-form');
            Route::put('/password', 'changeOwnPassword')->name('users.change-own-password');
            Route::middleware('role:super-admin|admin')->group(function () {
                Route::get('/', 'index')->name('users.index');
                Route::get('/create', 'create')->name('users.create');
                Route::post('/', 'store')->name('users.store');
                Route::get('/{id}/edit', 'edit')->name('users.edit');
                Route::put('/{id}', 'update')->name('users.update');
                Route::put('/password/{id}', 'changeUserPassword')->name('users.change-user-password');
                Route::get('/{id}/active', [UserController::class, 'active'])->name('users.active');
            });
        });
    });
});