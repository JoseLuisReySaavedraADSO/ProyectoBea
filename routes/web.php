<?php

use App\Http\Middleware\CheckUserRole;
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

// DASHBOARD

Route::get('/dashboard/{action}', [App\Http\Controllers\DashboardController::class, '__invoke'])->name('dashboardAction')->middleware('checkUserRole');

// DASHBOARD | SECCIONES 

Route::get('/dashboard/secciones/{action}/{id?}', [App\Http\Controllers\SeccionesController::class, '__invoke'])->name('seccionesAction')->middleware('checkUserRole');
Route::post('/dashboard/secciones/{action}/{id?}', [App\Http\Controllers\SeccionesController::class, '__invoke'])->name('seccionesAction')->middleware('checkUserRole');

// DASHBOARD | TEMAS 

Route::get('/dashboard/temas/{action}/{id?}', [App\Http\Controllers\TemasController::class, '__invoke'])->name('temasAction')->middleware('checkUserRole');
Route::post('/dashboard/temas/{action}/{id?}', [App\Http\Controllers\TemasController::class, '__invoke'])->name('temasAction')->middleware('checkUserRole');

// TEORIAS

Route::get('/dashboard/teorias/{action}/{id?}', [App\Http\Controllers\TeoriasController::class, '__invoke'])->name('teoriasAction')->middleware('checkUserRole');
Route::post('/dashboard/teorias/{action}/{id?}', [App\Http\Controllers\TeoriasController::class, '__invoke'])->name('teoriasAction')->middleware('checkUserRole');
// Route::post('/dashboard/teorias', [App\Http\Controllers\TeoriasController::class, 'create'])->name('teorias.create');

// USUARIOS 

Route::get('/userAction/{action}/{id?}', [App\Http\Controllers\UserController::class, '__invoke'])->name('userAction');

// VISTA

Route::get('/{view}', [App\Http\Controllers\HomeController::class, 'views'])->name('view');
