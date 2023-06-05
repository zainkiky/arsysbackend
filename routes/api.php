<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\Research;
use App\Http\Controllers\ResearchReview;
use App\Http\Controllers\ResearchType;
use App\Http\Controllers\SpecializationPivot;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudyProgram;
use App\Http\Controllers\StudySpecialization;
use App\Http\Controllers\StudySpecializationPivot;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/




Route::get('program', [StudyProgram::class, 'all']);

Route::get('specialization', [StudySpecialization::class, 'all']);

Route::get('pivot', [StudySpecializationPivot::class, 'pivot']);
Route::get('count', [StudySpecializationPivot::class, 'count']);

Route::get('student', [StudentController::class, 'alls']);
Route::get('student/count', [StudentController::class, 'count']);
Route::get('student/program', [StudentController::class, 'program']);

Route::get('supervisor', [SupervisorController::class, 'all']);

Route::get('research', [Research::class, 'all']);

Route::get('research-type', [ResearchType::class, 'all']);

route::get('research-review', [ResearchReview::class, 'all']);

Route::post('register', [UserController::class, 'register']);

Route::post('login', [UserController::class, 'login']);

Route::post('event', [EventController::class, 'all']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [UserController::class, 'fetch']);
    Route::post('user', [UserController::class, 'updateProfile']);
    Route::post('logout', [UserController::class, 'logout']);
});