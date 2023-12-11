<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_type',
        'name',
        'email',
        'password',

    ];

    public function isAdmin(): Attribute
    {
        if($this->user_type == 'admin'){
            return new Attribute(
                get: fn () => $this->user_type === \App\Enums\UserType::Admin,
            );
        }else{
            return new Attribute(
                get: fn () => $this->user_type === \App\Enums\UserType::User,
            );
        }
      
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function role(){
        return $this->belongsTo(Rol::class); // pide el rol al usuario
    }

    public function pedidos(){
        return $this->hasMany(Pedido::class);
    } 

    public static function totalProductosPorPedido(){
        $pedidos = Pedido::where('user_id', auth()->user()->id)->get();
        $total_productos = 0;
        foreach($pedidos as $pedido){
            $totalDetallePedidos = DetallePedido::where('pedido_id', $pedido->id)->get();
            foreach($totalDetallePedidos as $detalle){
                $total_productos += $detalle->cantidad;
            }
        }
        return $total_productos;
    }

    public static function totalDineroGastadoCompras(){
        $pedidos = Pedido::where('user_id', auth()->user()->id)->get();
        $total_gasto = 0;
        foreach($pedidos as $pedido){
            $totalDetallePedidos = DetallePedido::where('pedido_id', $pedido->id)->get();
            foreach($totalDetallePedidos as $detalle){
                $producto = Producto::find($detalle->producto_id);
                $total_gasto += $detalle->cantidad * $producto->price;
            }
        }
        return round($total_gasto);
    }
}
