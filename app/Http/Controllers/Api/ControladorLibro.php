<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Autor;
use App\Models\Libro;
use Illuminate\Http\Request;

class ControladorLibro extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libros = Libro::get();
        return response()->json($libros);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $libro = new Libro();
        $libro->titulo = $request->titulo;
        $libro->editorial = $request->editorial;
        $libro->precio = $request->precio;
        $libro->autor()->associate(Autor::findOrFail($request->autor_id));
        $libro->save();
        return response()->json($libro, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Libro $libro)
    {
        return response()->json($libro);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Libro $libro)
    {
        $libro->titulo = $request->titulo;
        $libro->editorial = $request->editorial;
        $libro->precio = $request->precio;
        $libro->autor()->associate(Autor::findOrFail($request->autor_id));
        $libro->save();
        return response()->json($libro, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Libro $libro)
    {
        $libro->delete();
        return response()->json(null, 204);
    }
}
