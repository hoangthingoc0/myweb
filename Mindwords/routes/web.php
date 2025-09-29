<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\UserController;
Route::get('/users', [UserController::class, 'displayUser']);
Route::get('/users/edit/{id}', [UserController::class, 'editUser']);
Route::post('/users/save', [UserController::class, 'saveUser']);
