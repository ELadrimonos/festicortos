<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControladorCorto extends Controller
{
    private $cortos = [
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
    public function index()
    {
        $cortos = $this->cortos;
        return view('cortos', compact('cortos'));
    }


    public function create()
    {

    }


    public function store(Request $request)
    {

    }


    public function show(string $id)
    {
        $indice = array_search(intval($id), array_column($this->cortos, 'id'));
        $entrada = $this->cortos[$indice];
        return view('cortos_show', compact('entrada'));
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
