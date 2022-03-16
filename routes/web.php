<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\ProjectController;
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

Route::post('/', [ProjectController::class, 'store'])->name('projects.store');

Route::get('/project/{projectId}', [ProjectController::class, 'show'])->name('projects.show');

Route::get('/projects/{id}/delete', [ProjectController::class, 'destroy'])->name('projects.destroy');

Route::get('/projects/{id}', [GroupController::class, 'show'])->name('groups.show');
//
//Route::put('/projects/{id}/groups', [GroupController::class, 'update'])->name('groups.show');
