<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    
    public function index()
    {
        $productos = Producto::all();
        return view('admin.productos.index')->with(['productos' => $productos]);
    }

    public function destroy($id){
        $producto = Producto::find($id); // buscar el pedido dado su id
        $producto->delete(); // método mágico de eliminar pedido
        return redirect()->route('admin.productos.index')->with('success', 'Producto eliminado correctamente');    
    }
}
