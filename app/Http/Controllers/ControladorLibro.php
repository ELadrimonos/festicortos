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
