<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StockProducto extends Model
{
    use HasFactory;

    public static function productos_stock($producto_id){
        $stock = DB::table('stock_productos')
                    ->where('producto_id', '=', $producto_id)
                    ->get();

        return $stock;
    }
    
}
