<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;

class ControladorLibro extends Controller
{
    public function index()
    {
        $libros = Libro::with('autores')->get();
        return view('libros', compact('libros'));
    }

    public function show(string $id)
    {
        echo "SHOW";
    }

    public function create()
    {
        return view('libros_form');
    }

    public function store(Request $request)
    {


        // Create a new Libro instance and save it to the database
        $libro = new Libro();
        $libro->titulo = $request->input('titulo');
        $libro->editorial = $request->input('editorial');
        $libro->precio = $request->input('precio');
        $libro->id_autor = $request->input('id_autor');
        // Set other attributes as needed
        $libro->save();

        return redirect()->route('libros.index')->with('success', 'Libro creado exitosamente');
    }

    public function edit(string $id)
    {
        $libro = Libro::findOrFail($id);
        return view('libros_form', compact('libro', 'id'));
    }

    public function update(Request $request, string $id)
    {

        // Find the Libro instance by ID and update its attributes
        $libro = Libro::findOrFail($id);
        $libro->titulo = $request->input('titulo');
        $libro->editorial = $request->input('editorial');
        $libro->precio = $request->input('precio');
        $libro->id_autor = $request->input('id_autor');
        // Update other attributes as needed
        $libro->save();

        return redirect()->route('libros.index')->with('success', 'Libro actualizado exitosamente');
    }

    public function destroy(string $id)
    {
        // Find the Libro instance by ID and delete it
        $libro = Libro::findOrFail($id);
        $libro->delete();

        return redirect()->route('libros.index')->with('success', 'Libro eliminado exitosamente');
    }
}
