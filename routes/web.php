<?php

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
    Route::post('user/roleassign', 'updateRole')->name('user.updaterole');
});
