<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

/**
 * Data Provider
 */
// UserModelTest
Route::post("posts", PostController::class)->name("posts.store");


/**
 * Mocking Example
 */
Route::post("register", RegistrationController::class)->name("register");

/**
 * Dynamic database change;
 */
// Change Mysql database dynamically
