<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Producto extends Model
{
    use HasFactory;

    public static function stockActual($id){

        $total = 0;
        $total_compra = 0;

        $total_inicio = DB::table('stock_productos')
        ->where('producto_id', $id)
        ->where('tipo', 'inicio')
        ->sum('cantidad');

        if($total_inicio > 0){

            $total_compra = DB::table('stock_productos')
            ->where('producto_id', $id)
            ->where('tipo', 'compra')
            ->sum('cantidad');  

            if($total_inicio - $total_compra > 0){
                $total = $total_inicio - $total_compra;
            }

        }

        return $total;
    }

    public function images(){
        return $this->hasMany(ImagenProducto::class); // genera una lista de usuarios dado un rol
    }

    public function fotoPortada(){
        return $this->hasOne(ImagenProducto::class)->where('tipo', 'portada')->first(); // genera una lista de usuarios dado un rol
    }

}
