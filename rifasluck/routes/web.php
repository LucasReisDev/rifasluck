<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\RifasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
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

Route::get('/', [EventController::class,'index']);
Route::get('/events/create', [EventController::class,'index']);

Route::get('/rifas', [RifasController::class, 'index'])->name('rifas');

Route::get('/rifa/{id}', [RifasController::class, 'show'])->name('rifa');
