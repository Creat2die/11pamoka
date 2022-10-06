<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\SquareController as S;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::inertia('/red-square', 'RedSquare');

Route::get('/red-square', [S::class, 'redSquare']);
Route::post('/add-square', [S::class, 'addSquare']);
Route::get('/get-square', [S::class, 'getSquares']);
Route::delete('/reset-square', [S::class, 'resetSquares']);




Route::get('/red-square-blade', [S::class, 'redSquareBlade']);




require __DIR__.'/auth.php';