<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;
use App\Models\Libro;

class ControladorLibro extends Controller
{
    public function index()
    {
        $libros = Libro::with('autores')->get();
        $autores = Autor::get();
        return view('libros', compact('libros', 'autores'));
    }

    public function search_author()
    {
        $autores = Autor::all();
        return view('libros_buscador_autor', compact('autores'));
    }

    public function filter($id)
    {
        $libros = Libro::with('autores')->get();

        return view('libros_buscador_autor');
    }

    public function entries($pagina = 1)
    {
        $numEntradas = 3;
        $empezarEntradas = ($pagina - 1) * $numEntradas;
        $libros = Libro::with('autores')->get();
        $autores = Autor::get();
        $entradas = array();
        for ($i = $empezarEntradas; $i < ($empezarEntradas + $numEntradas); $i++) {
            if (!isset($libros[$i])) break;

            $libro = $libros[$i];
            $autor_actual = null;
            foreach ($autores as $autor) {
                if ($autor['id'] == $libro['id_autor']) {
                    $autor_actual = $autor;
                    break;
                }
            }
            $entradas[] = array($libro, $autor_actual);
        }
        return view('libros_lista_con_autores', compact('entradas', 'pagina'));

    }

    public function show(string $id)
    {
        echo "SHOW";
    }

    public function create()
    {
        $autores = Autor::get();
        return view('libros_form', compact('autores'));
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
        $autores = Autor::get();
        return view('libros_form', compact('libro', 'id', 'autores'));
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
