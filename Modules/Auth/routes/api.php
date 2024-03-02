<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Auth\App\Http\Controllers\LoginController;
use Modules\Auth\App\Http\Controllers\LogoutController;
use Modules\Auth\App\Http\Controllers\RegisterController;
use Modules\Auth\App\Http\Controllers\ResetPasswordController;
use Modules\Auth\App\Http\Controllers\ForgotPasswordController;



Route::prefix('user')->group(function () {
    Route::post('register', [RegisterController::class,'register']);
    Route::post('login', [LoginController::class,'login']);
    Route::post('password/forgot ', [ForgotPasswordController::class, 'sendForgotLinkEmail']);
    Route::post('password/forgot/submit', [ForgotPasswordController::class, 'submitForgotPassword']);
    Route::post('password/reset', [ResetPasswordController::class, 'resetPassword'])->middleware(['auth:sanctum']);
    Route::post('logout', [LogoutController::class, 'logout'])->middleware(['auth:sanctum']);
});


Route::middleware(['auth:sanctum'])->prefix('v1')->name('api.')->group(function () {
    Route::get('auth', fn (Request $request) => $request->user())->name('auth');
});
