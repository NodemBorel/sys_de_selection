<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\Form_Enregistrement\DoctoratController;
use App\Http\Controllers\Form_Enregistrement\Licence1Controller;
use App\Http\Controllers\Form_Enregistrement\Licence2Controller;
use App\Http\Controllers\Form_Enregistrement\Licence3Controller;
use App\Http\Controllers\Form_Enregistrement\Master1Controller;
use App\Http\Controllers\Form_Enregistrement\Master2Controller;

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

Route::get('/licence-1', [Licence1Controller::class, 'licence1']);
Route::get('/licence-2', [Licence2Controller::class, 'licence2']);
Route::get('/licence-3', [Licence3Controller::class, 'licence3']);
Route::get('/master-1', [Master1Controller::class, 'master1']);
Route::get('/master-2', [Master2Controller::class, 'master2']);
Route::get('/doctorat', [DoctoratController::class, 'doctorat']);


Route::post('/submit-licence1', [Licence1Controller::class, 'save']);
Route::post('/submit-licence2', [Licence2Controller::class, 'save']);
Route::post('/submit-licence3', [Licence3Controller::class, 'save']);
Route::post('/submit-master1', [Master1Controller::class, 'save']);
Route::post('/submit-master2', [Master2Controller::class, 'save']);
Route::post('/submit-doctorat', [DoctoratController::class, 'save']);

Route::get('/login', [AuthenticationController::class, 'login'])->middleware('alreadyLoggedIn');
Route::post('login-user', [AuthenticationController::class, 'loginUser']);
Route::get('/dashboard', [AuthenticationController::class, 'dashboard'])->middleware('isLoggedIn');
Route::get('/logout', [AuthenticationController::class, 'logout']);
