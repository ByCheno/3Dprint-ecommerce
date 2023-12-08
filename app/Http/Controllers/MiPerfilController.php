<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;

class MiPerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $header = "Bienvenido a mi Perfil";
        $header2 = "Perfil de Usuario: " . auth()->user()->name;
        $sub_header = "Gestione su perfil";

        $categorias = Categoria::all();

        $productos_destacados = Producto::orderBy('price', 'desc')->limit(4)->get();

        return view('frontend.miperfil.index')->with([
            'header' => $header,
            'header2' => $header2,
            'sub_header' => $sub_header,
            'categorias' => $categorias,
            'productos_destacados' => $productos_destacados,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
