<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MechanicController as M;
use App\Http\Controllers\TruckController as T;

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
    return view('welcome');
});

Auth::routes(['register'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('mechanic')->name('m_')->group(function () {
    Route::get('/', [M::class, 'index'])->name('index');
    Route::get('/create', [M::class, 'create'])->name('create');
    Route::post('/create', [M::class, 'store'])->name('store');
    Route::get('/show/{mechanic}', [M::class, 'show'])->name('show');
    Route::delete('/delete/{mechanic}', [M::class, 'destroy'])->name('delete');
    Route::get('/edit/{mechanic}', [M::class, 'edit'])->name('edit');
    Route::put('/edit/{mechanic}', [M::class, 'update'])->name('update');

});

Route::prefix('truck')->name('t_')->group(function () {
    Route::get('/', [T::class, 'index'])->name('index');
    Route::get('/create', [T::class, 'create'])->name('create');
    Route::post('/create', [T::class, 'store'])->name('store');
    Route::get('/show/{truck}', [T::class, 'show'])->name('show');
    Route::delete('/delete/{truck}', [T::class, 'destroy'])->name('delete');
    Route::get('/edit/{truck}', [T::class, 'edit'])->name('edit');
    Route::put('/edit/{truck}', [T::class, 'update'])->name('update');

});