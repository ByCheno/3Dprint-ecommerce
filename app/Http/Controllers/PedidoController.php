<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::all();
        return view('admin.pedidos.index')->with(['pedidos' => $pedidos]);
    }
    
    public function destroy($id){
        $pedido = Pedido::find($id); // buscar el pedido dado su id
        $pedido->delete(); // método mágico de eliminar pedido
        return redirect()->route('admin.pedidos.index');    
    }

}
