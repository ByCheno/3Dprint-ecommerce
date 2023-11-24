<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\DetalleProducto;
use App\Models\ImagenProducto;

class ProductoController extends Controller
{
    
    public function index()
    {
        $productos = Producto::all();
        $categorias = Categoria::all();
        return view('admin.productos.index')->with(['productos' => $productos,'categorias' => $categorias]);
    }

    public function destroy($id){
        $producto = Producto::find($id); // buscar el pedido dado su id
        $producto->delete(); // método mágico de eliminar pedido
        return redirect()->route('admin.productos.index')->with('success', 'Producto eliminado correctamente');    
    }

    public function show($id){     
        $detalles = DetalleProducto::mostrarDetalle($id); // buscar el  producto dado su id 
        $producto = Producto::find($id); // buscar el producto dado su id   
        return view('admin.productos.show')->with(['detalles' => $detalles, 'producto'=>$producto]);    
    }

    public function crear(Request $request){
        $producto = new Producto();
        $producto->name = $request->name;
        $producto->description = $request->description;
        $producto->categoria_id = $request->categoria_id;
        $producto->price = $request->price;
        $producto->save();
        return redirect()->route('admin.productos.index')->with('success', 'Producto creado correctamente');
    }

    public function images($id){
        $producto = Producto::find($id); // buscar el producto dado su id
        $images = $producto->images()->orderBy('id', 'asc')->get();
        return view('admin.productos.images')->with(['producto' => $producto,'images' => $images]);    
    }

    public function subirImagenes(Request $request, $id){
        $producto = Producto::find($id); // buscar el producto dado su id
        $images = $request->file('images');
        foreach($images as $image){
            $nombre = time().'_'.$image->getClientOriginalName();
            $ruta = public_path().'/images/productos';
            $image->move($ruta, $nombre);
            
            $imagen = new ImagenProducto();
            $imagen->producto_id = $producto->id;
            $imagen->url = $nombre;
            $imagen->tipo = $request->tipo;
            $imagen->save();

        }
        return redirect()->route('admin.productos.images', $producto->id)->with('success', 'Imagenes subidas correctamente');
    }

}
