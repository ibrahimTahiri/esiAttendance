<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LessonController;

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
    return redirect('/students');
});

Route::get('/students', [StudentController::class,'getStudents'])->name('students.index');

Route::get('/students/create',  [StudentController::class,'create'])->name('students.create');
Route::post('/students',  [StudentController::class,'store'])->name('students.store');
Route::get('/students/show/{id}', [StudentController::class, 'show'])->name('students.show');

Route::post('/students/update/{id}', [StudentController::class,'update'])->name('students.update');
Route::delete('/students/delete/{id}', [StudentController::class, 'delete'])->name('students.delete');


Route::get('/lessons',[LessonController::class,'getLessons'])->name('lessons.index');
