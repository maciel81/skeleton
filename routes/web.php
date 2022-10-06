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

Route::middleware(['auth', 'user.active'])->group(function () {
    Route::get('/', function () {
        return view('layouts.app');
    })->name('home');


    Route::prefix('/user')->group(function () {
        Route::get('/password', [UserController::class, 'changePasswordForm'])->name('user.change-password-form');
        Route::put('/password', [UserController::class, 'changeOwnPassword'])->name('user.change-own-password');
    });

    Route::prefix('/admin')->group(function () {
        Route::prefix('/users')->group(function () {
            Route::controller(UserController::class)->group(function () {
                Route::middleware('role:super-admin|admin')->group(function () {
                    Route::get('/', 'index')->name('admin.users.index');
                    Route::get('/create', 'create')->name('admin.users.create');
                    Route::post('/', 'store')->name('admin.users.store');
                    Route::get('/{user}/edit', 'edit')->name('admin.users.edit');
                    Route::put('/{user}', 'update')->name('admin.users.update');
                    Route::put('/password/{user}', 'changeUserPassword')->name('admin.users.change-user-password');
                    Route::get('/{user}/active', [UserController::class, 'active'])->name('admin.users.active');
                });
            });
        });
    });
});