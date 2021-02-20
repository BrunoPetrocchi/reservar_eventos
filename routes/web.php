<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('reserva', 'App\Http\Controllers\CelebracaoController');
Route::get('reserva/delete/{id}', 'App\Http\Controllers\CelebracaoController@destroy');

Route::resource('participante', 'App\Http\Controllers\PessoasController');
