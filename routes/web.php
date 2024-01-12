<?php

use Illuminate\Support\Facades\Route;

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

Route::get('cortos', function () {
    $cortos = [
        [
            'id' => 1,
            'titulo' => 'El corto más cortante',
            'director' => 'María Martín',
            'sinapsis' => 'Lorem ipsum dolor sit amet, consectetur
adipiscing elit, sed do eiusmod tempor incididunt ut labore
et dolore magna aliqua.'
        ],
        [
            'id' => 2,
            'titulo' => 'Sin más',
            'director' => 'Pepa Pérez',
            'sinapsis' => 'Lorem ipsum dolor sit amet, consectetur
adipiscing elit, sed do eiusmod tempor incididunt ut labore
et dolore magna aliqua.'
        ],
        [
            'id' => 3,
            'titulo' => 'Más o menos',
            'director' => 'Juan Jiménez',
            'sinapsis' => 'Lorem ipsum dolor sit amet, consectetur
adipiscing elit, sed do eiusmod tempor incididunt ut labore
et dolore magna aliqua.'
        ],
        [
            'id' => 4,
            'titulo' => 'Tira pa\' ya',
            'director' => 'Sofía Sofín',
            'sinapsis' => 'Lorem ipsum dolor sit amet, consectetur
adipiscing elit, sed do eiusmod tempor incididunt ut labore
et dolore magna aliqua.'
        ],
        [
            'id' => 5,
            'titulo' => 'Miedo',
            'director' => 'Pepe Parrilla',
            'sinapsis' => 'Lorem ipsum dolor sit amet, consectetur
adipiscing elit, sed do eiusmod tempor incididunt ut labore
et dolore magna aliqua.'
        ]
    ];

    return view('cortos', compact('cortos'));
})->name('listado_cortos');

Route::get('libros', function () {

    $libros = array(
        array("titulo" => "El juego de Ender",
            "autor" => "Orson Scott Card"),
        array("titulo" => "La tabla de Flandes",
            "autor" => "Arturo Pérez Reverte"),
        array("titulo" => "La historia interminable",
            "autor" => "Michael Ende"),
        array("titulo" => "El Señor de los Anillos",
            "autor" => "J.R.R. Tolkien")
    );

    return view('libros', compact('libros'));
})->name('listado_libros');
