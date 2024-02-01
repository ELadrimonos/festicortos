<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorLibro;
use App\Http\Controllers\ControladorCorto;
use App\Http\Controllers\ControladorAutor;
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

// Sirve para guardar datos de sesión en Laravel
Route::group(['middleware' => ['web']], function () {
    Route::get('libros/entradas/{pagina}', [ControladorLibro::class, 'entries'])->name('libros.entries');
    Route::get('libros/buscar', [ControladorLibro::class, 'search_author'])->name('libros.buscar');
    Route::post('libros/autor', [ControladorLibro::class, 'filter'])->name('libros.filtrar');
    Route::delete('libros/borrar/{id}', [ControladorLibro::class, 'destroy'])->name('libros.destroy');
    Route::delete('autores/borrar/{id}', [ControladorAutor::class, 'destroy'])->name('autores.destroy');
    Route::resource('libros',ControladorLibro::class);
    Route::resource('cortos',ControladorCorto::class);
    Route::resource('autores',ControladorAutor::class);
});

// API REST
Route::get('api/libros', [ControladorLibro::class, 'get_libros'])->name('libros.get_libros');
Route::get('api/autores', [ControladorLibro::class, 'get_autores'])->name('libros.get_autores');
Route::get('api/libros/{id}', [ControladorLibro::class, 'get_libro'])->name('libros.get_libro');
Route::get('api/autores/{id}', [ControladorLibro::class, 'get_autor'])->name('libros.get_autor');
Route::get('api/autores/{id}/libros', [ControladorLibro::class, 'get_libros_autor'])->name('libros.get_libros_autor');
