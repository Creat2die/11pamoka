<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComentController as C;
use App\Http\Controllers\MovieController as M;
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



Auth::routes();

Route::get('/', [H::class, 'homeList'])->name('home')->middleware('gate:home');
Route::put('/rate/{movie}', [H::class, 'rate'])->name('rate')->middleware('gate:user');
Route::post('/coment/{movie}', [H::class, 'addcoment'])->name('coment')->middleware('gate:user');



Route::prefix('movie')->name('m_')->group(function () {
    Route::get('/', [M::class, 'index'])->name('index')->middleware('gate:user');
    Route::get('/create', [M::class, 'create'])->name('create')->middleware('gate:admin');
    Route::post('/create', [M::class, 'store'])->name('store')->middleware('gate:admin');
    Route::get('/show/{movie}', [M::class, 'show'])->name('show')->middleware('gate:user');
    Route::delete('/delete/{movie}', [M::class, 'destroy'])->name('delete')->middleware('gate:admin');
    Route::get('/edit/{movie}', [M::class, 'edit'])->name('edit')->middleware('gate:admin');
    Route::put('/edit/{movie}', [M::class, 'update'])->name('update')->middleware('gate:admin');
});


Route::prefix('coment')->name('c_')->group(function () {
    Route::get('/', [C::class, 'index'])->name('index')->middleware('gate:user');
    Route::delete('/delete/{coment}', [C::class, 'destroy'])->name('delete')->middleware('gate:admin');
   
});