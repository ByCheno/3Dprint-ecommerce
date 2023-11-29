<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
class FrontendController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $header = "Infinitecs";
        $sub_header = "Los mejores productos del mercado en España";

        $response = Http::get('http://127.0.0.1:8000/api/v1/productos');

        if ($response->successful()) {
            $productos = $response->json();
            return view('frontend.index')->with(['header' => $header, 'sub_header' => $sub_header, 'productos' => $productos]);

        } else {
            $productos = [];
            abort($response->status(), "Error al leer los productos de la api");
        }

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
