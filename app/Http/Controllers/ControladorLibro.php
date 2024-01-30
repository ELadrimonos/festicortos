<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;
use App\Models\Libro;
use Termwind\Components\Li;

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

    public function filter(Request $request)
    {
        // Obtener el ID del autor cuyo nombre coincida con el proporcionado en la solicitud
        $nombreAutor = $request->input('nombre_autor');
        $autor = Autor::where('nombre', $nombreAutor)->first();

        // Verificar si el autor existe
        if (!$autor) {
            // Manejar el caso en el que no se encuentre el autor
            return redirect()->route('home'); // Reemplaza 'nombre_de_la_ruta' con la ruta que desees
        }

        $libros = Libro::where('id_autor', $autor->id)->get();


        return view('resultados_libros_autor', compact('libros', 'nombreAutor'));
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

    }

    public function get_libro(string $id)
    {
        return Libro::where('id', $id)->first();
    }

    public function get_libros()
    {
        return Libro::all();
    }

    public function get_autores()
    {
        return Autor::all();
    }

    public function get_autor(string $id)
    {
        return Autor::where('id', $id)->first();
    }

    public function get_libros_autor(string $id)
    {
        $autor =Autor::where('id', $id)->first();

        return Libro::where('id_autor', $autor->id)->get();
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
