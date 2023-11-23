<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\DetalleCategoria;

class CategoriaController extends Controller
{
    
    public function index()
    {
        $categorias = Categoria::all();
        return view('admin.categorias.index')->with(['categorias' => $categorias]);
    }

    public function destroy($id){
        $categoria = Categoria::find($id); // buscar la categoria dada su id
        $categoria->delete(); // méto para eliminar categoria
        return redirect()->route('admin.categorias.index')->with('success', 'categoria eliminado correctamente');    
    }

    public function show($id){       
        $detalles = DetalleCategoria::mostrarDetalle($id); // buscar la  categoria dado su id 
        $categoria = Categoria::find($id); // buscar el categoria dado su id   
        return view('admin.categorias.show')->with(['detalles' => $detalles, 'categoria'=>$categoria]);    
    }

}
