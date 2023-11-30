<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Producto;

class FrontendController extends Controller
{

    public function index()
{
    $header = "Infinitecs";
    $sub_header = "Los mejores productos del mercado en España";

    // Haciendo una solicitud GET a la API local
    $respuesta = Http::timeout(60)->get('http://127.0.0.1:8000/api/v1/productos');

    if ($respuesta->successful()) {
        $productos = $respuesta->json();
    } else {
        $productos = [];
    }

    return view('frontend.index')->with(['header' => $header, 'sub_header' => $sub_header, 'productos' => $productos]);
}
    
    /**
     * Display a listing of the resource.
     */
    public function index1()
    {

        $header = "Infinitecs";
        $sub_header = "Los mejores productos del mercado en España";

            $productos = Producto::all();
            return view('frontend.index')->with(['header' => $header, 'sub_header' => $sub_header, 'productos' => $productos]);

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
    public function show(string $id)
    {
        //
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
