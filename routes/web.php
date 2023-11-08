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

Route::get('/dashboard/secciones', [App\Http\Controllers\DashboardController::class, 'secciones'])->name('dashboard.secciones')->middleware('checkUserRole');
Route::get('/dashboard/temas', [App\Http\Controllers\DashboardController::class, 'temas'])->name('dashboard.temas')->middleware('checkUserRole');
Route::get('/dashboard/teorias', [App\Http\Controllers\DashboardController::class, 'teorias'])->name('dashboard.teorias')->middleware('checkUserRole');

// DASHBOARD | SECCIONES 

Route::get('/dashboard/secciones/edit/{id}', [App\Http\Controllers\SeccionesController::class, 'edit'])->name('dashboard.secciones.edit')->middleware('checkUserRole');
Route::post('/dashboard/secciones/update/{id}', [App\Http\Controllers\SeccionesController::class, 'update'])->name('dashboard.secciones.update')->middleware('checkUserRole');
Route::post('/dashboard/secciones/add', [App\Http\Controllers\SeccionesController::class, 'store'])->name('dashboard.secciones.add')->middleware('checkUserRole');
Route::delete('/dashboard/secciones/delete/{id}', [App\Http\Controllers\SeccionesController::class, 'destroy'])->name('dashboard.secciones.delete')->middleware('checkUserRole');

// DASHBOARD | TEMAS 

Route::get('/dashboard/temas/edit/{id}', [App\Http\Controllers\TemasController::class, 'edit'])->name('dashboard.temas.edit')->middleware('checkUserRole');
Route::post('/dashboard/temas/update/{id}', [App\Http\Controllers\TemasController::class, 'update'])->name('dashboard.temas.update')->middleware('checkUserRole');
Route::post('/dashboard/temas/add', [App\Http\Controllers\TemasController::class, 'store'])->name('dashboard.temas.add')->middleware('checkUserRole');
Route::delete('/dashboard/temas/delete/{id}', [App\Http\Controllers\TemasController::class, 'destroy'])->name('dashboard.temas.delete')->middleware('checkUserRole');

// USUARIOS 
Route::get('/userAction/{action}/{id?}', [App\Http\Controllers\UserController::class, '__invoke'])->name('userAction');
Route::get('/{view}', [App\Http\Controllers\HomeController::class, 'views'])->name('view');