<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacto;

class ContactoController extends Controller
{
    
    public function index()
    {
        $contactos = Contacto::all();
        return view('admin.contacto.index')->with(['contactos' => $contactos]);
    }

    public function destroy($id){
        $contacto = Contacto::find($id); 
        $contacto->delete();
        return redirect()->route('admin.contacto.index')->with('success', 'Mensaje de contacto eliminado correctamente');    
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
}
