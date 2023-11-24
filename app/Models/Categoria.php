<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Categoria extends Model
{
    use HasFactory;

    public static function productos_categoria_id($id_categoria){
        $productos = DB::table('productos')
        ->Where('categoria_id', '=', $id_categoria)
        ->get();

        return $productos;
    }

}
