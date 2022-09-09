<?php

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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::prefix('users')->controller(\App\Http\Controllers\UserController::class)->name('users.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/', 'store')->name('store');
    Route::get('create', 'create')->name('create');
    Route::get('{account}/edit', 'edit')->name('edit');
    Route::patch('{account}', 'update')->name('update');
    Route::delete('{account}', 'destroy')->name('destroy');
});

Route::prefix('roles')->controller(\App\Http\Controllers\RoleController::class)->name('roles.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('{role}/edit', 'edit')->name('edit');
    Route::post('/', 'store')->name('store');
    Route::patch('{role}', 'edit')->name('update');
    Route::delete('{role}', 'destroy')->name('destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});

require __DIR__.'/auth.php';
