<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;


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

// prevent back
Route::group(['middleware' => 'prevent-back-history'],function(){
    Route::get('/admin/classes', [CommentController::class, 'index'])->name('admin.classes.index')->middleware('auth');
    Route::get('/admin/dashboard',[DashboardController::class,'index'])->middleware('auth');
    Route::middleware(['auth'])->group(function () {
    Route::resource('/admin/students', CategoryController::class)->names('admin.students');
    });
    Route::middleware(['auth'])->group(function () {
        Route::resource('/admin/teachers', ArticleController::class)->names('admin.teachers');
    });
});
