<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\DetalleProducto;
use App\Models\StockProducto;
use App\Models\Categoria;

class FrontendController extends Controller
{

    public function index1()
    {
        $header = "Infinitecs";
        $sub_header = "Los mejores productos del mercado en España";

        try {
            // Haciendo una solicitud GET a la API local
            $respuesta = Http::timeout(-1)->get('http://127.0.0.1:8000/api/v1/productos');

            if ($respuesta->successful()) {
                $productos = $respuesta->json();
            } else {
                $productos = [];
            }
        } catch (\Exception $e) {
            // Captura y maneja excepciones
            return back()->withError($e->getMessage())->withInput();
        }

        return view('frontend.index')->with(['header' => $header, 'sub_header' => $sub_header, 'productos' => $productos]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $header = "Infinitecs";
        $header2 = "";
        $sub_header = "Los mejores productos del mercado en España";

        $ultimos_productos = Producto::orderBy('created_at', 'desc')->limit(8)->get();
        $productos_destacados = Producto::orderBy('price', 'desc')->limit(4)->get();

        return view('frontend.index')->with([
            'header' => $header,
            'header2' => $header2,
            'sub_header' => $sub_header,
            'productos' => $ultimos_productos,
            'productos_destacados' => $productos_destacados
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show1(string $id)
    {
        try {
            // Haciendo una solicitud GET a la API local para obtener el producto específico
            $respuesta = Http::timeout(-1)->get("http://127.0.0.1:8000/api/v1/productos/{$id}");

            if ($respuesta->successful()) {
                $producto = $respuesta->json();
            } else {
                // En caso de una respuesta fallida, establece producto como null o maneja como prefieras
                $producto = null;
            }
        } catch (\Exception $e) {
            // Captura y maneja excepciones
            return back()->withError($e->getMessage())->withInput();
        }

        // Asegúrate de modificar la vista y los datos que envías según tus necesidades
        return view('admin.productos.show')->with(['producto' => $producto]);
    }
    public function show(string $id)
    {

        $header = "Detalle producto";
        $header2 = "";
        $sub_header = "Los mejores productos del mercado en España";

        $producto_detalle = Producto::find($id); // dame el detalle del producto con id X
        $productos = Producto::all(); //Dame todos los productos
        $productos_destacados = Producto::orderBy('price', 'desc')->limit(4)->get();

        return view('frontend.componentes.show_producto')->with([
            'header' => $header,
            'header2' => $header2,
            'sub_header' => $sub_header,
            'producto_detalle' => $producto_detalle,
            'productos_destacados' => $productos_destacados,
            'productos' => $productos
        ]);
    }

    public function tienda()
    {
        $header = "Elige que deseas ver";
        $header2 = "Nosotros nos encargamos del resto ;)";
        $sub_header = "Los mejores productos del mercado 3D en España";

        $categorias = Categoria::all();

        $productos = Producto::all();

        $productos_destacados = Producto::orderBy('price', 'desc')->limit(4)->get();

        return view('frontend.componentes.productos_categoria')->with([
            'header' => $header,
            'header2' => $header2,
            'sub_header' => $sub_header,
            'productos' => $productos,
            'categorias' => $categorias,
            'productos_destacados' => $productos_destacados,
        ]);
    }

    public function filtrar_productos(Request $request)
    {
        $header = "Elige que deseas ver";
        $header2 = "Nosotros nos encargamos del resto ;)";
        $sub_header = "Los mejores productos del mercado 3D en España";

        $categorias = Categoria::all();

        $productos = Producto::query();

        // Aplicar filtro por categoría si se proporciona
        if ($request->filled('categoria_id')) {
            $productos->where('categoria_id', $request->input('categoria_id'));
        }

        // Aplicar filtro por precio mínimo si se proporciona
        if ($request->filled('pmin')) {
            $productos->where('price', '>=', $request->input('pmin'));
        }

        // Aplicar filtro por precio máximo si se proporciona
        if ($request->filled('pmax')) {
            $productos->where('price', '<=', $request->input('pmax'));
        }

        // Obtener los resultados
        $productos_filtrados = $productos->get();

        $productos_destacados = Producto::orderBy('price', 'desc')->limit(4)->get();

        return view('frontend.componentes.productos_categoria')->with([
            'header' => $header,
            'header2' => $header2,
            'sub_header' => $sub_header,
            'productos' => $productos_filtrados,
            'categorias' => $categorias,
            'productos_destacados' => $productos_destacados,
        ]);
    }

    public function carrito()
    {
        $header = "Elige que deseas ver";
        $header2 = "Nosotros nos encargamos del resto ;)";
        $sub_header = "Los mejores productos del mercado 3D en España";


        $productos_destacados = Producto::orderBy('price', 'desc')->limit(4)->get();

        return view('frontend.carrito.index')->with([
            'header' => $header,
            'header2' => $header2,
            'sub_header' => $sub_header,
            'productos_destacados' => $productos_destacados,
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function agregar(Request $request,$id){

        $producto_id = $id;
        $producto = Producto::find($producto_id);
        $carrito = session()->get('carrito', []);

        // Si el producto ya está en el carrito, incrementa la cantidad
        if(isset($carrito[$producto->id])) {
            $carrito[$producto->id]['cantidad'] += $request->cantidad;
        } else {
            // Si no está en el carrito, añádelo
            $carrito[$producto->id] = [
                "nombre" => $producto->nombre,
                "precio" => $producto->precio,
                "cantidad" => $request->cantidad
            ];
        }

        session()->put('carrito', $carrito);
        return redirect()->route('frontend.productos.tienda');

    }
}
