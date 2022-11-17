<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController as C;

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
    // Route::delete('/delete/{country}', [C::class, 'destroy'])->name('delete');
    // Route::get('/edit/{country}', [C::class, 'edit'])->name('edit');
    // Route::put('/edit/{country}', [C::class, 'update'])->name('update');
    // Route::get('/show/{country}', [C::class, 'show'])->name('show');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
