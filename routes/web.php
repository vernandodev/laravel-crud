<?php

use App\Http\Controllers\EdulevelController;
use App\Http\Controllers\ProgramController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/edulevels', [EdulevelController::class, 'index'])
->name('edulevels');

// Edulevel
Route::get('/edulevels/add', [EdulevelController::class, 'create'])
->name('edulevels/add');

Route::post('edulevels', [EdulevelController::class, 'store']);

Route::get('edulevels/edit/{id}', [EdulevelController::class, 'edit']);

Route::patch('edulevels/{id}', [EdulevelController::class, 'update']);

Route::delete('edulevels/{id}', [EdulevelController::class, 'destroy']);

// Program
Route::resource('programs', ProgramController::class);

