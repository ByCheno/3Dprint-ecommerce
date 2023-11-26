<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\DetalleProducto;
use App\Models\ImagenProducto;
use App\Models\StockProducto;

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
        $stocks = StockProducto::productos_stock($id);
        return view('admin.productos.show')->with(['detalles' => $detalles, 'producto'=>$producto, 'stocks'=>$stocks]);    
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
        $images = $producto->images()->orderBy('tipo', 'asc')->get();
        return view('admin.productos.images')->with(['producto' => $producto,'images' => $images]);    
    }

    public function subirImagenes(Request $request, $id){
        $producto = Producto::find($id); // buscar el producto dado su id
        $images = $request->file('images');       
       
        if($request->tipo == 'portada' && count($images) > 1){

            return redirect()->route('admin.productos.images', $producto->id)->with('error', 'Solo se puede subir una imagen de portada');
        
        }else{
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

    public function editar($id){
        $producto = Producto::find($id); // buscar el producto dado su id
        return view('admin.productos.edit')->with(['producto' => $producto]);    
    }

    public function update(Request $request, $id){
        $producto = Producto::find($id); // buscar el producto dado su id
        $producto->name = $request->name;
        $producto->description = $request->description;
        $producto->categoria_id = $request->categoria_id;
        $producto->price = $request->price;
        $producto->save();
        return redirect()->route('admin.productos.index')->with('success', 'Producto actualizado correctamente');    
    }

    public function verStock($id){
        $stocks = StockProducto::productos_stock($id);
        $producto = Producto::find($id); // buscar el producto dado su id
        return view('admin.productos.stock')->with(['stocks' => $stocks,'producto' => $producto]);    
    }

    public function updateStock(Request $request, $id){

        if(Producto::stockActual($id) < $request->cantidad && $request->tipo == 'compra'){
            return redirect()->route('admin.productos.stock', $id)->with('error', 'No hay suficiente stock para realizar la venta');       
        }else{
        
            $stock = new StockProducto();
            $stock->producto_id = $id;
            $stock->cantidad = $request->cantidad;
            $stock->tipo = $request->tipo;
            $stock->fecha = $request->fecha;
            $stock->save();
    
            return redirect()->route('admin.productos.stock', $id)->with('success', 'Stock actualizado correctamente');   
        } 
    }

    public function eliminarStock($id){
        $stock = StockProducto::find($id); // buscar el producto dado su id
        $stock->delete(); // método mágico de Laravel para eliminar pedido
        return redirect()->route('admin.productos.stock', $stock->producto_id)->with('success', 'Stock eliminado correctamente');    
    }


    public function actualizarFotoPortada($id){

        $producto_id = ImagenProducto::find($id)->producto_id; // buscar el producto dado el id de la imagen
        $producto = Producto::find($producto_id); // buscar el producto dado su id
        $images = $producto->images()->orderBy('id', 'asc')->get();

        foreach($images as $image){
            $image->tipo = 'galeria'; 
            $image->save();
        }

        $imagen_portada = ImagenProducto::find($id);
        $imagen_portada->tipo = 'portada';
        $imagen_portada->save();

        return redirect()->route('admin.productos.images', $producto_id)->with('success', 'Imagen portada seleccionada correctamente');    
    }


    public function eliminarImagen($id){
        $imagen = ImagenProducto::find($id); // buscar el producto dado su id

        $ruta = public_path().'/images/productos/'.$imagen->url;
        unlink($ruta);

        $imagen->delete(); // método mágico de Laravel para eliminar pedido
        return redirect()->route('admin.productos.images', $imagen->producto_id)->with('success', 'Imagen eliminada correctamente');    
    }

}
