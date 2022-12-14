<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController as C;
use App\Http\Controllers\HotelController as H;

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

Route::prefix('countries')->name('c_')->group(function () {
    Route::get('/', [C::class, 'index'])->name('index');
    Route::get('/create', [C::class, 'create'])->name('create');
    Route::post('/create', [C::class, 'store'])->name('store');
    Route::delete('/delete/{country}', [C::class, 'destroy'])->name('delete');
    Route::get('/edit/{country}', [C::class, 'edit'])->name('edit');
    Route::put('/edit/{country}', [C::class, 'update'])->name('update');
    Route::get('/show/{country}', [C::class, 'show'])->name('show');
});

Route::prefix('hotels')->name('h_')->group(function () {
    Route::get('/', [H::class, 'index'])->name('index');
    Route::get('/create', [H::class, 'create'])->name('create');
    Route::post('/create', [H::class, 'store'])->name('store');
    Route::delete('/delete/{hotel}', [H::class, 'destroy'])->name('delete');
    Route::get('/edit/{hotel}', [H::class, 'edit'])->name('edit');
    Route::put('/edit/{hotel}', [H::class, 'update'])->name('update');
    Route::get('/show/{hotel}', [H::class, 'show'])->name('show');
});
