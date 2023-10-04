<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\YearController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::middleware('auth')->prefix('dashboard')->group(function () {
    Route::resource('question', QuestionController::class);
    Route::resource('grade', GradeController::class);
    Route::resource('student', StudentController::class);
    Route::resource('year', YearController::class);
    Route::resource('teacher', TeacherController::class);
    Route::resource('subject', SubjectController::class);
    Route::get('evaluation/{evaluation}/evaluate', [EvaluationController::class, 'evaluate'])->name('evaluation.evaluate');
    Route::resource('evaluation', EvaluationController::class);
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
