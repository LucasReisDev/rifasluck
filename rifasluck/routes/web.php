<?php

use App\Http\Controllers\EventController;
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

Route::get('/rifas', function () {
    $busca = request('search');
    return view('rifas', ['busca'=>$busca] );
});

Route::get('/rifa/{id?}', function ($id = null) {
    return view('rifa',['id' => $id]);
});
