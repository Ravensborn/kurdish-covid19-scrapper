<?php

use App\Http\Controllers\HomeController;
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

Route::get('/update', [HomeController::class, 'update'])->name('update');

Route::get('/', function () {
    return redirect()->home();
});
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/world-statistics', [HomeController::class, 'worldStats'])->name('worldStats');
Route::get('/kurdistan-statistics', [HomeController::class, 'kurdistanStats'])->name('kurdistanStats');
Route::get('/about', [HomeController::class, 'about'])->name('about');

