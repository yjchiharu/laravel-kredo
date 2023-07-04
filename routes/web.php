<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ClassroomController as AdminClassroomController;
use App\Http\Controllers\Admin\TeacherController as AdminTeacherController;
use App\Http\Controllers\Admin\StudentController as AdminStudentController;
use App\Http\Controllers\Admin\CourseController as AdminCourseController;
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


Auth::routes();

Route::group(['middleware'=> 'auth'], function(){
    Route::get('/', [HomeController::class, 'index'])->name('index');


    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){
        #CLASSROOM
        Route::get('/class/all', [AdminClassroomController::class, 'index'])->name('classroom');
        Route::get('/class/create', [AdminClassroomController::class, 'create'])->name('create');
        Route::post('/class/store', [AdminClassroomController::class, 'store'])->name('classroom.store');
        Route::get('/class/history', [AdminClassroomController::class, 'history'])->name('classroom.history');
        Route::delete('/class/{id}/destroy', [AdminClassroomController::class, 'destroy'])->name('classroom.destroy');

        #TEACHERS
        Route::get('/teacher/all', [AdminTeacherController::class, 'index'])->name('teacher');
        Route::get('/teacher/create', [AdminTeacherController::class, 'create'])->name('teacher.create');
        Route::post('/teacher/store', [AdminTeacherController::class, 'store'])->name('teacher.store');
        Route::patch('/teacher/{id}/activate', [AdminTeacherController::class, 'activate'])->name('teacher.activate');
        Route::delete('/teacher/{id}/deactivate', [AdminTeacherController::class, 'deactivate'])->name('teacher.deactivate');
        Route::delete('teacher/{id}/destroy', [AdminTeacherController::class, 'destroy'])->name('teacher.destroy');


        #STUDENTS
        Route::get('/student/all', [AdminStudentController::class, 'index'])->name('student');
        Route::get('/student/create', [AdminStudentController::class, 'create'])->name('student.create');
        Route::post('student/store', [AdminStudentController::class, 'store'])->name('student.store');
        Route::patch('/student/{id}/activate', [AdminStudentController::class, 'activate'])->name('student.activate');
        Route::delete('/student/{id}/deactivate', [AdminStudentController::class, 'deactivate'])->name('student.deactivate');
        Route::delete('/student/{id}/destroy', [AdminStudentController::class, 'destroy'])->name('student.destroy');

        #COURSES
        Route::get('/course/all', [AdminCourseController::class, 'index'])->name('course');
        Route::get('/course/create', [AdminCourseController::class, 'create'])->name('course.create');
        Route::post('/course/store', [AdminCourseController::class, 'store'])->name('course.store');
        Route::delete('/course/{id}/destroy', [AdminCourseController::class, 'destroy'])->name('course.destroy');
    });

    Route::group(['prefix' => 'student', 'as' => 'student.'], function(){
        Route::get('/' ,[StudentController::class, 'index'])->name('index');
        Route::patch('/{class_id}/save-booking', [StudentController::class, 'saveBooking'])->name('save-booking');
        Route::patch('/{class_id}/cancel-booking', [StudentController::class, 'cancelBooking'])->name('cancel-booking');
        Route::get('/history', [StudentController::class, 'history'])->name('history');
    });

    Route::group(['prefix' => 'teacher', 'as' => 'teacher.'], function(){
        Route::get('/', [TeacherController::class, 'index'])->name('index');
        Route::delete('/class/{class_id}/destroy', [TeacherController::class, 'destroy'])->name('class.destroy');
        Route::get('/history', [TeacherController::class, 'history'])->name('history');
        Route::patch('/class/{class_id}/revert', [TeacherController::class, 'revert'])->name('revert');
    });

    
});


