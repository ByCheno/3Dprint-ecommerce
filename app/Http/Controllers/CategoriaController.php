<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    
    public function index()
    {
        $categorias = Categoria::all();
        return view('admin.categorias.index')->with(['categorias' => $categorias]);
    }
}
