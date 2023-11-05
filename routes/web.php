<?php

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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// SECTIONS

Route::get('/secciones', [App\Http\Controllers\SeccionesController::class, 'index'])->name('secciones');
Route::get('/secciones/tema/{id}', [App\Http\Controllers\TemasController::class, 'index'])->name('temas');
// Route::get('/temas', [App\Http\Controllers\SeccionesController::class, 'tema'])->name('temas');

// DASHBOARD
// dd(auth()->user());
Route::get('/dashboard/secciones', [App\Http\Controllers\DashboardController::class, 'secciones'])->name('dashboard.secciones')->middleware('checkUserRole');
Route::get('/dashboard/temas', [App\Http\Controllers\DashboardController::class, 'temas'])->name('dashboard.temas')->middleware('checkUserRole');
Route::get('/dashboard/teorias', [App\Http\Controllers\DashboardController::class, 'teorias'])->name('dashboard.teorias')->middleware('checkUserRole');