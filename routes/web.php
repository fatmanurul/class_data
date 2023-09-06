<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CobaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/coba', [CobaController::class, 'index']);

// prevent back
Route::group(['middleware' => 'prevent-back-history'],function(){
    Route::get('/admin/classes', [ClassController::class, 'index'])->name('admin.classes.index')->middleware('auth');
    Route::get('/admin/dashboard',[DashboardController::class,'index'])->middleware('auth');
    Route::middleware(['auth'])->group(function () {
    Route::resource('/admin/students', StudentController::class)->names('admin.students');
    });
    Route::middleware(['auth'])->group(function () {
        Route::resource('/admin/teachers', TeacherController::class)->names('admin.teachers');
    });
});

Route::get('/admin/students/{id}/switch', [StudentController::class,'switch']);
Route::get('/admin/teachers/{id}/switch', [TeacherController::class,'switch']);

//route auth
Route::get('/login', [LoginController::class ,'index'])->name('login');
Route::post('/login', [LoginController::class ,'authenticate']);
Route::post('/logout', [LoginController::class ,'logout']);
