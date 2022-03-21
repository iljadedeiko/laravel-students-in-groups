<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ProjectController::class, 'index'])->name('projects');

Route::post('/projects/store', [ProjectController::class, 'store'])->name('projects.store');

Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');

Route::delete('/projects/delete/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');

Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');

Route::post('/students/store', [StudentController::class, 'store'])->name('students.store');

Route::delete('/students/delete/{student}', [StudentController::class, 'destroy'])->name('students.destroy');

Route::put('/students/update/{groupId}', [StudentController::class, 'update'])->name('students.update');
