<?php

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


Route::get('/', [App\Http\Controllers\WelcomeController::class,'index']);

Route::get('/commander/{slug}', [App\Http\Controllers\WelcomeController::class,'commander'])->name('commander')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('commandes', App\Http\Controllers\CommandeController::class)->middleware('auth');

Route::get('/paydunya/{reference}', [App\Http\Controllers\PaydunyaController::class, 'index'])->name('paydunya.index');

Route::get('/success', [App\Http\Controllers\PaydunyaController::class, 'success'])->name('paydunya.success');

Route::get('/annuler', [App\Http\Controllers\PaydunyaController::class, 'annuler'])->name('paydunya.annuler');

