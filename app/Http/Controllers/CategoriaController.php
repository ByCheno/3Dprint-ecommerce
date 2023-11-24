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
        return redirect()->route('admin.categorias.index')->with('success', 'Categoría eliminada correctamente');    
    }

    public function show($id){       
        $productos = Categoria::productos_categoria_id($id); // buscar la  categoria dado su id 
        $categoria = Categoria::find($id); // buscar el categoria dado su id   
        return view('admin.categorias.show')->with(['productos' => $productos, 'categoria'=>$categoria]);    
    }

    public function crear(Request $request){
        $categoria = new Categoria();
        $categoria->name = $request->name;
        $categoria->description = $request->description;
        $categoria->save();
        return redirect()->route('admin.categorias.index')->with('success', 'Categoría creado correctamente');    
    }

    public function editar($id){
        $categoria = Categoria::find($id); // buscar la categoria dado su id
        return view('admin.categorias.edit')->with(['categoria' => $categoria]);    
    }

    public function update(Request $request, $id){
        $categoria = Categoria::find($id); // buscar la categoria dado su id
        $categoria->name = $request->name;
        $categoria->description = $request->description;
        $categoria->save();
        return redirect()->route('admin.categorias.index')->with('success', 'Categoría actualizada correctamente');    
    }
    
}
