<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Session;

class CarritoController extends Controller
{
    public function agregarCarrito($id)
    {
        $producto = Producto::find($id);

        if(!$producto) {
            abort(404);
        }

        $carrito = session()->get('carrito', []);

        if(isset($carrito[$id])) {
            $carrito[$id]['cantidad']++;
        } else {
            $carrito[$id] = [
                "nombre" => $producto->nombre,
                "cantidad" => 1,
                "precio" => $producto->precio,
                "foto" => $producto->foto
            ];
        }

        session()->put('carrito', $carrito);

        return response()->json(['success' => true]);
    }
}