<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DetallePedido extends Model
{
    use HasFactory;


    public static function mostrarDetalle($id){
        $detalles = DB::table('detalle_pedidos')
        ->where('pedido_id', $id)
        ->get();

        return $detalles;
    }
}
