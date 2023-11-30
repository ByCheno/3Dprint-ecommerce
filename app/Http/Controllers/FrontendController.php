<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\DetalleProducto;
use App\Models\StockProducto;

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
        $sub_header = "Los mejores productos del mercado en España";

        $productos = Producto::all();
        return view('frontend.index')->with([
            'header' => $header, 
            'sub_header' => $sub_header, 
            'productos' => $productos
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

        $header = "Infinitecs";
        $sub_header = "Los mejores productos del mercado en España";

        $producto_detalle = Producto::find($id); // buscar el producto dado su id
        $productos = Producto::all();
        
        return view('frontend.componentes.show_producto')->with([
            'header' => $header, 
            'sub_header' => $sub_header,
            'producto_detalle'=>$producto_detalle, 
            'productos'=>$productos
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
}
