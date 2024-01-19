<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;
class ControladorLibro extends Controller
{
    public function index()
    {
//        $libros = array(
//            array("titulo" => "El juego de Ender",
//                "autor" => "Orson Scott Card"),
//            array("titulo" => "La tabla de Flandes",
//                "autor" => "Arturo Pérez Reverte"),
//            array("titulo" => "La historia interminable",
//                "autor" => "Michael Ende"),
//            array("titulo" => "El Señor de los Anillos",
//                "autor" => "J.R.R. Tolkien")
//        );
        $libros = Libro::get();
        //$autores = Autor::get();
        return view('libros', compact('libros'));

    }

    public function show(string $id)
    {

    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function edit(string $id)
    {

    }


    public function update(Request $request, string $id)
    {

    }


    public function destroy(string $id)
    {

    }

}
