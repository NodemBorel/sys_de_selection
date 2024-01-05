<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\Form_Enregistrement\Master1Controller;
use App\Http\Controllers\Form_Enregistrement\Master2Controller;
use App\Http\Controllers\Form_Enregistrement\DoctoratController;
use App\Http\Controllers\Form_Enregistrement\Licence1Controller;
use App\Http\Controllers\Form_Enregistrement\Licence2Controller;
use App\Http\Controllers\Form_Enregistrement\Licence3Controller;
use App\Http\Controllers\Admin\ImportExport\Licence1ImportExport;
use App\Http\Controllers\Admin\Licence1Controller as AdminLicence1Controller;

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

Route::get('/course', [CourseController::class, 'course']);

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

Route::get('/publication', [PublicationController::class, 'display']);
Route::get('/pub-licence2', [PublicationController::class, 'display_l2']);
Route::get('/pub-licence3', [PublicationController::class, 'display_l3']);
Route::get('/pub-master1', [PublicationController::class, 'display_ms1']);
Route::get('/pub-master2', [PublicationController::class, 'display_ms2']);
Route::get('/pub-doctorat', [PublicationController::class, 'display_doc']);

Route::get('/login', [AuthenticationController::class, 'login'])->middleware('alreadyLoggedIn');
Route::post('login-user', [AuthenticationController::class, 'loginUser']);
Route::get('/dashboard', [AuthenticationController::class, 'dashboard'])->middleware('isLoggedIn');
Route::get('/logout', [AuthenticationController::class, 'logout']);

Route::get('/licence1', [AdminLicence1Controller::class, 'licence1']);
Route::post('/block-links', [AdminLicence1Controller::class, 'blockUnblockLinks']);

Route::post('/licence1_import', [Licence1ImportExport::class, 'import']);
Route::get('/licence1_export', [Licence1ImportExport::class, 'export']);

Route::get('/selectlicence1', [AdminLicence1Controller::class, 'licence1']);
Route::post('/validselect1', [AdminLicence1Controller::class, 'validselect']);
Route::post('/delete-select1', [AdminLicence1Controller::class, 'delete_select']);