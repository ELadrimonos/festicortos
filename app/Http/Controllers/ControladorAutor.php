<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;
use App\Models\Libro;
use Termwind\Components\Li;

class ControladorAutor extends Controller
{
    public function index()
    {
        $autores = Autor::get();
        return view('autores', compact('autores'));
    }

    public function show(string $id)
    {

    }




    public function create()
    {
        return view('autores_form');
    }

    public function store(Request $request)
    {
        // Create a new Libro instance and save it to the database
        $autor = new Autor();
        $autor->nombre = strtoupper($request->input('nombre'));
        $autor->nacimiento = $request->input('nacimiento');

        // Set other attributes as needed
        $autor->save();

        return redirect()->route('autores.index')->with('success', 'Autor creado exitosamente');
    }

    public function edit(string $id)
    {
        $autor = Autor::findOrFail($id);
        return view('autores_form', compact('autor', 'id'));
    }

    public function update(Request $request, string $id)
    {

        // Find the Libro instance by ID and update its attributes
        $autor = Autor::findOrFail($id);
        $autor->nombre = $request->input('nombre');
        $autor->nacimiento = $request->input('nacimiento');
        // Update other attributes as needed
        $autor->save();

        return redirect()->route('autores.index')->with('success', 'Autor actualizado exitosamente');
    }

    public function destroy(string $id)
    {
        try {
            $autor = Autor::findOrFail($id);
            $autor->delete();
            return redirect()->route('autores.index')->with('success', 'Autor eliminado exitosamente');

        } catch (\Illuminate\Database\QueryException $e) {

            // Al fallar el método delete este lanza una excepción
            return redirect()->route('autores.index')->with('error', 'Hubo un problema al eliminar el autor, es posible que tenga algún libro asociado');
        }
    }
}
