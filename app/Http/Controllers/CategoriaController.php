<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

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
}
