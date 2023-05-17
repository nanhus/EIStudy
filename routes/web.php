<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ResetPasswordController;
use Illuminate\Auth\Notifications\ResetPassword;

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


Route::get("/", [IndexController::class, "index"])->name('/');

Route::get('register', [UserController::class, "register"])->name('register');

Route::post('register', [UserController::class, 'register_action'])->name('register.action');

Route::get('login', [UserController::class, "login"])->name('login');

Route::get('/verify-email/{token}', [UserController::class, "email_verified_at"])->name('verify_email')->middleware('guest');

Route::post('login', [UserController::class, 'login_action'])->name('login.action');

Route::get('logout', [UserController::class, 'logout'])->name('logout');

Route::get('home', [HomeController::class, "index"])->name('home');

Route::get('forgot-password', [ResetPasswordController::class, 'forgotPassword'])->name('forgot-password');

Route::post("forgot-password/otp",[ResetPasswordController::class, 'getOTP'])->name('get-otp');

Route::get("forgot-password/otp/verify", [ResetPasswordController::class, 'getVerifyOTP'])->name('get-verify-otp');

Route::post("forgot-password/otp/verify/success/", [ResetPasswordController::class, 'verifyOTP'])->name('verify-otp');

Route::get("forgot-password/otp/verify/success/reset-password", [ResetPasswordController::class, 'getResetPassword'])
->name('get-reset-password');

Route::post("forgot-password/otp/verify/success/reset-password/success", [ResetPasswordController::class, 'resetPassword'])
->name('reset-password');
