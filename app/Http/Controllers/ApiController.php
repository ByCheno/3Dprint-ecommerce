<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\User;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function productos()
    {   
        /* productos final es un array que tendrá como claves id, nombre, precio y la foto de portada */     
        $productos_final = [];
        $productos = Producto::orderBy('id', 'desc')->limit(8)->get();
        foreach($productos as $producto){
            $producto_final = []; 
            $producto_final['id'] = $producto->id;
            $producto_final['name'] = $producto->name;
            $producto_final['price'] = $producto->price;
            $producto_final['foto_portada'] = $producto->fotoPortada();
            array_push($productos_final, $producto_final);
        }
       

        return response()->json($productos_final);
    }

    public function categorias()
    {        
        $categorias = Categoria::orderBy('id', 'desc')->get();        
        return response()->json($categorias);
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
