<?php

use App\Http\Controllers\DBController;
use Illuminate\Support\Facades\Auth;
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



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('inicio');
Route::get('/clientes', [App\Http\Controllers\HomeController::class, 'clientes'])->name('clientes');
Route::get('/propostas', [App\Http\Controllers\HomeController::class, 'propostas'])->name('propostas');
Route::get('/clientes/cadastrar',[App\Http\Controllers\DBController::class, 'index'])->name('cadastrar');
Route::post('/clientes/editar/{id}',[App\Http\Controllers\DBController::class, 'editar'])->name('editar');
Route::post('/clientes/deletar/{id}', [App\Http\Controllers\DBController::class, 'deletar'])->name('deletar');
Route::get('/propostas/cadastrar',[App\Http\Controllers\PropostasDBController::class, 'cadastrar'])->name('cadastrar');
Route::post('/propostas/editar/{id}',[App\Http\Controllers\PropostasDBController::class, 'editar'])->name('editar');
Route::post('/propostas/deletar/{id}',[App\Http\Controllers\PropostasDBController::class, 'deletar'])->name('deletar');
