<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\DetallePedido;
use App\Models\User;
use App\Models\Producto;
use App\Models\StockProducto;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::all();
        $usuarios = User::all();
        return view('admin.pedidos.index')->with(['pedidos' => $pedidos,'usuarios' => $usuarios]);
    }
    
    public function destroy($id){
        $pedido = Pedido::find($id); // buscar el pedido dado su id
        $pedido->delete(); // método mágico de eliminar pedido
        return redirect()->route('admin.pedidos.index')->with('success', 'Pedido eliminado correctamente');    
    }
    
    public function show($id){       
        $detalles = DetallePedido::mostrarDetalle($id); // buscar el pedido dado su id 
        $pedido = Pedido::find($id); // buscar el pedido dado su id  
        $productos = Producto::all();
        $productosFinal = array();

        foreach($productos as $producto){
            if(Producto::stockActual($producto->id) > 0)    
                array_push($productosFinal, $producto);
        }

        return view('admin.pedidos.show')->with(['detalles' => $detalles, 'pedido'=>$pedido, 'productos'=>$productosFinal]);    
    }

    public function completar($id){
        $pedido = Pedido::find($id); // buscar el pedido dado su id
        $pedido->estado = 'completado';
        $pedido->save();
        return redirect()->route('admin.pedidos.index')->with('success', 'Pedido completado correctamente');
    }

    public function crear(Request $request){
        $pedido = new Pedido();
        $pedido->user_id = $request->user_id;
        $pedido->estado = 'pendiente';
        $pedido->fecha = $request->fecha;
        $pedido->save();
        return redirect()->route('admin.pedidos.index')->with('success', 'Pedido creado correctamente');
    }


    public function asignarDetallePedido(Request $request, $id){
        $pedido = Pedido::find($id); // buscar el pedido dado su id
        $detalle = new DetallePedido();
        $detalle->pedido_id = $pedido->id;
        $detalle->producto_id = $request->producto_id;
        $detalle->cantidad = $request->cantidad;
        $detalle->save();


        $stock = new StockProducto();
        $stock->producto_id = $request->producto_id;
        $stock->cantidad = $request->cantidad;
        $stock->fecha = now();
        $stock->tipo = 'compra';
        $stock->save();

        return redirect()->route('admin.pedidos.show', $pedido->id)->with('success', 'Detalle creado correctamente');
    }

}
