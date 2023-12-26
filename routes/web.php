<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Niveau1Controller;
use App\Http\Controllers\AuthenticationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/course', function () {
    return view('course');
});

Route::get('/niveau-1', [Niveau1Controller::class, 'niveau1']);

Route::get('/login', [AuthenticationController::class, 'login'])->middleware('alreadyLoggedIn');
Route::post('login-user', [AuthenticationController::class, 'loginUser']);
Route::get('/dashboard', [AuthenticationController::class, 'dashboard'])->middleware('isLoggedIn');
Route::get('/logout', [AuthenticationController::class, 'logout']);
