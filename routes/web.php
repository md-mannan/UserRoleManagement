<?php

use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::redirect('/', 'user');
Route::controller(UserController::class)->group(function () {
    Route::get('user', 'index')->name('user.index');
    Route::get('user/create', 'create')->name('user.create');
    Route::post('user/create', 'store')->name('user.store');
    Route::post('user/edit', 'edit')->name('user.edit');
    Route::put('user/update', 'update')->name('user.update');
    Route::post('user/delete', 'delete')->name('user.delete');
    Route::post('user/show', 'show')->name('user.show');
    Route::post('user/roleassign', 'RoleAssigntoRole')->name('user.updaterole');
});
Route::controller(RoleController::class)->group(function () {
    Route::get('role', 'index')->name('role.index');
    Route::get('role/create', 'create')->name('role.create');
    Route::post('role/create', 'store')->name('role.store');
    Route::post('role/edit', 'edit')->name('role.edit');
    Route::put('role/update', 'update')->name('role.update');
    Route::post('role/delete', 'delete')->name('role.delete');
    Route::post('role/show', 'show')->name('role.show');
    Route::post('role/roleassign', 'AssignUsertoRole')->name('role.updaterole');
});
