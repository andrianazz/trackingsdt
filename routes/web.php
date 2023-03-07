<?php

use App\Http\Controllers\SearchController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\DB;
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

Route::get('/', [SearchController::class, 'index'])->name('index');
Route::post('/', [SearchController::class, "search"])->name('search');
Route::get('/web', [SearchController::class, "toWeb"])->name('toWeb');
