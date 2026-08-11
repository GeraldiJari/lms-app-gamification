<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Student\DashboardController as StudentDashboardController;
use App\Http\Controllers\Student\CourseController;
use App\Http\Controllers\Student\SessionController as StudentSessionController;
use App\Http\Controllers\Student\MaterialController as StudentMaterialController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [
    DashboardController::class,
    'index'
])
->middleware(['auth', 'verified'])
->name('dashboard');


Route::middleware('auth')->group(function () {

    Route::get('/profile', [
        ProfileController::class,
        'edit'
    ])->name('profile.edit');


    Route::patch('/profile', [
        ProfileController::class,
        'update'
    ])->name('profile.update');


    Route::delete('/profile', [
        ProfileController::class,
        'destroy'
    ])->name('profile.destroy');

});

Route::middleware(['auth','student'])
    ->prefix('learning')
    ->group(function(){

        Route::get('/', [
            StudentDashboardController::class,
            'index'
        ])->name('student.dashboard');

        // Courses
        Route::get('/courses', [
            CourseController::class,
            'index'
        ])->name('student.courses');

        Route::get('/courses/{course}',[
            CourseController::class,
            'show'
        ])->name('student.courses.show');

        Route::get('/courses/{course}/sessions/{session}', [
            StudentSessionController::class,
            'show'
        ])->name('student.sessions.show');

        // Materials
        Route::get('/courses/{course}/sessions/{session}/materials', [
            StudentMaterialController::class,
            'index'
        ])->name('student.materials.index');

        Route::get('/courses/{course}/sessions/{session}/materials/{material}', [
            StudentMaterialController::class,
            'show'
        ])->name('student.materials.show');

    });


require __DIR__.'/auth.php';