<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use App\Models\User;

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


Route::get("/", [IndexController::class, "index"]);

Route::get('register', [UserController::class, "register"])->name('register');

Route::post('register', [UserController::class, 'register_action'])->name('register.action');

Route::get('login', [UserController::class, "login"])->name('login');

Route::get('/verify-email/{token}', [UserController::class, "email_verified_at"])->name('verify_email')->middleware('guest');

Route::post('login', [UserController::class, 'login_action'])->name('login.action');

Route::get('logout', [UserController::class, 'logout'])->name('logout');

Route::get('home', [HomeController::class, "index"])->name('home');


