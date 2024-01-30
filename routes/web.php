<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorLibro;
use App\Http\Controllers\ControladorCorto;
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

Route::get('/', function () {
    return view('home');
})->name('home');

//Route::get('cortos', [ControladorCorto::class, 'index'])->name('listado_cortos');
//Route::get('cortos/{id}', [ControladorCorto::class, 'show'])->name('detalle_corto');
//
//Route::get('libros', [ControladorLibro::class, 'index'])->name('listado_libros');
Route::get('libros/entradas/{pagina}', [ControladorLibro::class, 'entries'])->name('libros.entries');
Route::get('libros/buscar', [ControladorLibro::class, 'search_author'])->name('libros.buscar');
Route::post('libros/autor', [ControladorLibro::class, 'filter'])->name('libros.filtrar');
Route::resource('libros',ControladorLibro::class);
Route::resource('cortos',ControladorCorto::class);
