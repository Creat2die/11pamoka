<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestoranController as R;
use App\Http\Controllers\DishController as D;
use App\Http\Controllers\HomeController as H;

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

Auth::routes();

Route::prefix('restorans')->name('r_')->group(function () {
    Route::get('/', [R::class, 'index'])->name('index')->middleware('gate:user');
    Route::get('/create', [R::class, 'create'])->name('create')->middleware('gate:admin');
    Route::post('/create', [R::class, 'store'])->name('store')->middleware('gate:admin');
    Route::delete('/delete/{restoran}', [R::class, 'destroy'])->name('delete')->middleware('gate:admin');
    Route::get('/edit/{restoran}', [R::class, 'edit'])->name('edit')->middleware('gate:admin');
    Route::put('/edit/{restoran}', [R::class, 'update'])->name('update')->middleware('gate:admin');
    Route::get('/show/{restoran}', [R::class, 'show'])->name('show')->middleware('gate:user');
});

Route::prefix('dishes')->name('d_')->group(function () {
    Route::get('/', [D::class, 'index'])->name('index')->middleware('gate:user');
    Route::get('/create', [D::class, 'create'])->name('create')->middleware('gate:admin');
    Route::post('/create', [D::class, 'store'])->name('store')->middleware('gate:admin');
    Route::delete('/delete/{dish}', [D::class, 'destroy'])->name('delete')->middleware('gate:admin');
    Route::get('/edit/{dish}', [D::class, 'edit'])->name('edit')->middleware('gate:admin');
    Route::put('/edit/{dish}', [D::class, 'update'])->name('update')->middleware('gate:admin');
    Route::get('/show/{dish}', [D::class, 'show'])->name('show')->middleware('gate:user');
});



//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [H::class, 'homeList'])->name('home')->middleware('gate:home');
Route::put('/rate/{restoran}', [H::class, 'rate'])->name('rate')->middleware('gate:user');