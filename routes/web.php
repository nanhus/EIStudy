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

Route::post('login', [UserController::class, 'login_action'])->name('login.action');

Route::get('logout', [UserController::class, 'logout'])->name('logout');

Route::get('home', [HomeController::class, "index"])->name('home');

// Verify email

Route::get('/verify-email/{token}', function (Request $request, $token) {
    $user = User::where('verification_token', $token)->firstOrFail();
    $user->email_verified_at = now();
    $user->save();
    return redirect()->route('login')->with('success', 'Your email address has been verified. Please login.');
})->name('verify_email')->middleware('guest');