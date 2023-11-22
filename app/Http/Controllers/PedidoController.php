<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\DetallePedido;

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
        return redirect()->route('admin.pedidos.index')->with('success', 'Pedido eliminado correctamente');    
    }
    
    public function show($id){       
        $detalles = DetallePedido::mostrarDetalle($id); // buscar el pedido dado su id 
        $pedido = Pedido::find($id); // buscar el pedido dado su id   
        return view('admin.pedidos.show')->with(['detalles' => $detalles, 'pedido'=>$pedido]);    
    }

    public function completar($id){
        $pedido = Pedido::find($id); // buscar el pedido dado su id
        $pedido->estado = 'completado';
        $pedido->save();
        return redirect()->route('admin.pedidos.index')->with('success', 'Pedido completado correctamente');
    }

}
