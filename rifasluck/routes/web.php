<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\RifasController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


Route::get('/', [EventController::class,'index']);

Route::get('/events/create', [EventController::class,'index']);

Route::get('/rifas', [RifasController::class, 'index'])->name('rifas');

Route::get('/rifa/{id}', [RifasController::class, 'show'])->name('rifa');

Route::get('/criar-rifa', [RifasController::class, 'create'])->name('rifas.create');

Route::post('/criar-rifa', [RifasController::class, 'store'])->name('rifas.store');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
