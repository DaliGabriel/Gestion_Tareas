<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TareasController;
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



Route::get('/', function () {
    return redirect('ver_tareas');
})->middleware(['auth', 'verified'])->name('index');

Route::get('/dashboard', function () {
    return redirect('ver_tareas');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::resource('tareas', TareasController::class)
    ->only(['index', 'store', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::get('/ver_tareas', [TareasController::class, 'ver_tareas'])->middleware(['auth', 'verified'])->name('ver_tareas');

Route::post('/ver_tareas', [TareasController::class, 'buscar_tareas'])->middleware(['auth', 'verified'])->name('buscar_tareas');


require __DIR__.'/auth.php';
