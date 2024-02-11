<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Autor;
use Illuminate\Http\Request;

class ControladorAutor extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $autores = Autor::get();
        return response()->json($autores);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $autor = new Autor();
        $autor->nombre = $request->nombre;
        $autor->nacimiento = $request->nacimiento;
        $autor->save();
        return response()->json($autor, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Autor $autor)
    {
        return response()->json($autor);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Autor $autor)
    {
        $autor->nombre = $request->nombre;
        $autor->nacimiento = $request->nacimiento;
        $autor->save();
        return response()->json($autor, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Autor $autor)
    {
        $autor->delete();
        return response()->json(null, 204);
    }
}
