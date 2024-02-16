<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PagamentoController;
use App\Http\Controllers\RifasController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


Route::get('/', [EventController::class,'index']);

Route::get('/events/create', [EventController::class,'index']);

Route::get('/rifas', [RifasController::class, 'index'])->name('rifas');

Route::get('/rifa/{id}', [RifasController::class, 'show'])->name('rifa');

Route::get('/dashboard', [RifasController::class, 'create'])->name('dashboard');

Route::post('/dashboard', [RifasController::class, 'store'])->name('rifas.store');

Route::post('/processar-pagamento', [PagamentoController::class, 'processarPagamento'])->name('pagamento.processar');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
