<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
      
        $total_ingresos = \DB::table('pedidos')
        ->join('detalle_pedidos', 'pedidos.id', '=', 'detalle_pedidos.pedido_id')
        ->join('productos', 'productos.id', '=', 'detalle_pedidos.producto_id')
        ->where('pedidos.estado', '=', 'completado')
        ->sum(\DB::raw('productos.price*detalle_pedidos.cantidad'));

        return view('admin.index')->with(['total' =>$total_ingresos]);
      
    }
}
