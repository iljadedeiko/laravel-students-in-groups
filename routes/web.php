<?php

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

Route::get('/project/{id}', [ProjectController::class, 'show'])->name('projects.show');
