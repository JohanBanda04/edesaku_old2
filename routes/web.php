<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionaireController;
use App\Http\Controllers\VillageController;

use App\Http\Controllers\ArtisanController;

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

// Route::prefix('files')->group(function () {
//     Route::view('/', 'welcome');
//     Route::view('/upload', 'welcome');
//     Route::view('/download', 'welcome');
//     Route::view('/view', 'welcome');
//     Route::view('/history', 'welcome');
// });
// Route::controller(QuestionaireController::class)->group(function(){}); /* doesn't work in host web service */
// Route::middleware('auth')->group(function(){});

Route::view('/system', 'system_tool')->middleware('role:Developer');
Route::post('/system', [ArtisanController::class, 'call'])->middleware('role:Developer');

Route::get('/', [HomeController::class, 'index']);
Route::redirect('/home', '/');
Route::post('/time/change-time-limit', [HomeController::class, 'change_time_limit']);

Route::get('/questionaire/{village_id}', [QuestionaireController::class, 'view']);
Route::get('/questionaire/fill/{village_id}', [QuestionaireController::class, 'view_fill'])->middleware('role:Village');
Route::post('/questionaire/fill/{village_id}', [QuestionaireController::class, 'fill'])->middleware('role:Village');
Route::get('/questionaire/score/{village_id}', [QuestionaireController::class, 'view_score'])->middleware('role:Administrator');
Route::post('/questionaire/score/{village_id}', [QuestionaireController::class, 'score'])->middleware('role:Administrator');
Route::get('/questionaire/download/{village_id}', [QuestionaireController::class, 'download']);

Route::get('/files', [FileController::class, 'view_all']);
Route::get('/files/empty', [FileController::class, 'view_empty_files']);
Route::get('/files/verified', [FileController::class, 'view_verified_files']);
Route::get('/files/not-verified', [FileController::class, 'view_not_verified_files']);
Route::get('/files/view/{village_id}/{file_id}', [FileController::class, 'view_files'])->whereNumber('file_id');
Route::get('/files/download/{village_file_id}', [FileController::class, 'download'])->whereNumber('village_file_id');
Route::get('/files/upload/{village_id}/{file_id}', [FileController::class, 'view_upload'])->whereNumber(['village_id', 'file_id'])->middleware('auth');
Route::post('/files/upload/{village_id}/{file_id}', [FileController::class, 'upload'])->whereNumber(['village_id', 'file_id'])->middleware('auth');
Route::get('/files/message/{village_file_id}', [FileController::class, 'view_file_message'])->whereNumber('village_file_id')->middleware('auth');
Route::post('/files/message/{village_file_id}', [FileController::class, 'message'])->whereNumber('village_file_id')->middleware('role:Administrator');
Route::get('/files/verify/{village_file_id}', [FileController::class, 'verify'])->whereNumber('village_file_id')->middleware('role:Administrator');
Route::get('/files/cancel_verification/{village_file_id}', [FileController::class, 'cancel_verification'])->whereNumber('village_file_id')->middleware('role:Administrator');
Route::get('/files/delete/{village_file_id}', [FileController::class, 'delete'])->whereNumber('village_file_id')->middleware('auth');

Route::get('/villages/files-status', [VillageController::class, 'view_village_files_status']);
Route::get('/villages/{village_id}/files', [VillageController::class, 'view_village_files'])->whereNumber('village_id');
Route::get('/villages/{village_id}/messages', [VillageController::class, 'view_village_messages'])->whereNumber('village_file_id')->middleware('auth');

Route::get('/users', [UserController::class, 'view_users'])->middleware('auth');
Route::view('/users/register', 'register_user')->middleware('role:Developer');
Route::post('/users/register', [UserController::class, 'register_user'])->middleware('role:Developer');
Route::get('/users/{user_id}/files', [UserController::class, 'view_user_files'])->whereNumber('user_id');
Route::get('/users/reset_password/{username}', [UserController::class, 'reset_password'])->middleware('auth');

Route::view('/login', 'login')->name('login')->middleware('guest');
Route::post('/login', [UserController::class, 'login'])->middleware('guest');
Route::get('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::view('/change_password', 'change_password')->middleware('auth');
Route::post('/change_password', [UserController::class, 'change_password'])->middleware('auth');

