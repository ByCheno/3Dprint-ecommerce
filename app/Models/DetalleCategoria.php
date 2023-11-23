<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DetalleCategoria extends Model
{
    use HasFactory;


    public static function mostrarDetalle($id){
        $detalles = DB::table('productos')
        ->Where('categoria_id', '=', $id)
        ->get();

        return $detalles;
    }
}
